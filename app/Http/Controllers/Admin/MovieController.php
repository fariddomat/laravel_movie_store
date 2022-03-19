<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Country;
use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Session;
use App\Jobs\StreamMovie;

use App\Http\Requests\StoreVideoRequest;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_movies')->only(['index']);
        $this->middleware('permission:create_movies')->only(['create','store']);
        $this->middleware('permission:update_movies')->only(['edit','update']);
        $this->middleware('permission:delete_movies')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $categories=Category::all();
        $movies=Movie::latest()->whenSearch(request()->search)
            ->whenCategory(request()->category)
            ->with('categories')
            ->paginate(5);


        return view('admin.movies.index',compact('movies', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $countries=Country::all();
        $movie=Movie::create([]);
        return view('admin.movies.create',compact('categories', 'countries', 'movie'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $movie = Movie::FindOrFail($request->movie_id);

        if (!$request->movie->isValid()) {
            throw new \Exception('Error on upload file: '.$request->movie->getErrorMessage());
        }
        $movie->update([
            'name' => $request->name,
            'path' => $request->file('movie')->store('public/movies_upload'),
        ]);

        // dd($movie->path);
        //the job in background
        $this->dispatch(new StreamMovie($movie));

        return $movie;
        Session::flash('success','Successfully Created !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return $movie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $categories = Category::all();
        $countries = Country::all();
        return view('admin.movies.edit', compact('categories', 'countries', 'movie'));

    }//end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Movie $movie)
    {

        $request_data = $request->except(['poster', 'image'.'stars','categories']);

        if ($request->type == 'publish') {

            //publish
            $request->validate([
                'name' => 'required|unique:movies,name,' . $movie->id,
                'description' => 'required',
                'poster' => 'required|image',
                'image' => 'required|image',
                'categories' => 'required|array',
                'country_id' => 'required',
                'director' => 'required',
                'writer' => 'required',
                'stars' => 'required',
                'year' => 'required',
                'rating' => 'required',
            ]);

        } else {

            //update
            $request->validate([
                'name' => 'required|unique:movies,name,' . $movie->id,
                'description' => 'required',
                'poster' => 'sometimes|nullable|image',
                'image' => 'sometimes|nullable|image',
                'categories' => 'required|array',
                'country_id' => 'required',
                'director' => 'required',
                'writer' => 'required',
                'stars' => 'required',
                'year' => 'required',
                'rating' => 'required',
            ]);


        }//end of else



        if ($request->poster) {

            $this->remove_previous('poster', $movie);

            $poster = Image::make($request->poster)
                ->resize(255, 378)
                ->encode('jpg');

            Storage::disk('local')->put('public/images/' . $request->poster->hashName(), (string)$poster, 'public');
            $request_data['poster'] = $request->poster->hashName();

        }//end of if

        if ($request->image) {

            $this->remove_previous('image', $movie);

            $image = Image::make($request->image)
                ->encode('jpg', 50);

            Storage::disk('local')->put('public/images/' . $request->image->hashName(), (string)$image, 'public');
            $request_data['image'] = $request->image->hashName();

        }//end of if

        $movie->update($request_data);
        $movie->categories()->sync($request->categories);

        Session::flash('success','Successfully updated !');
        return redirect()->route('admin.movies.index');

    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        Storage::disk('local')->delete('public/images/' . $movie->poster);
        Storage::disk('local')->delete('public/images/' . $movie->image);
        Storage::disk('local')->delete($movie->path);

        Storage::disk('local')->deleteDirectory('public/movies/' . $movie->id);

        $movie->delete();
        Session::flash('success','Successfully deleted !');
        return redirect()->route('admin.movies.index');
    }

    private function remove_previous($image_type, $movie)
    {
        if ($image_type == 'poster') {

            if ($movie->poster != null)
                Storage::disk('local')->delete('public/images/' . $movie->poster);

        } else {

            if ($movie->image != null)
                Storage::disk('local')->delete('public/images/' . $movie->image);

        }//end of else

    }// end of remove_previous
}
