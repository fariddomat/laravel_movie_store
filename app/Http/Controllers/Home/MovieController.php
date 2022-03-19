<?php

namespace App\Http\Controllers\Home;

use App\Category;
use App\Country;
use App\Http\Controllers\Controller;
use App\Movie;
use App\User;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;

use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{

    public function show($id)
    {
        $categories = Category::all();
        $countries = Country::all();

        $movie = Movie::find($id);

        $rate = 0;

        if ($movie) {

            if (Auth::user()) {
                try {
                    $rating = Rating::where('rateable_id', $movie->id)
                        ->where('user_id', Auth::user()->id)->first();
                    $rate = $rating->rating;
                } catch (\Throwable $th) {
                }
            }
            $rating_average = $movie->averageRating;

            $latest_movies = Movie::whereNotNull('name')->latest()
                ->limit(6)
                ->get();

            $related_movies = Movie::where('id', '!=', $movie->id)
                ->whereHas('categories', function ($query) use ($movie) {
                    return $query->whereIn('category_id', $movie->categories->pluck('id')->toArray());
                })
                ->limit(9)
                ->orderBy('rating', 'desc')
                ->get();

            $shareButtons = \Share::currentPage($movie->description)
                ->facebook()
                ->twitter()
                ->linkedin()
                ->telegram()
                ->whatsapp()
                ->reddit();
            return view('movie', compact('movie', 'shareButtons',  'rate', 'rating_average', 'categories', 'countries', 'latest_movies', 'related_movies'));
        } else {
            abort(404);
        }
    }

    public function show_category($id)
    {
        $categories = Category::all();
        $countries = Country::all();

        $latest_movies = Movie::whereNotNull('name')->latest()
            ->limit(8)
            ->get();
        $top_movies = Movie::orderBy('rating', 'desc')->orderBy('views', 'desc')
            ->latest()
            ->limit(9)
            ->get();

        $movies = Movie::whereHas('categories', function ($q) use ($id) {
            return $q->where('category_id', $id);
        })->paginate(10); 

        $category = Category::find($id);
        // dd($movies);
        if ($movies) {
            return view('category', compact('category', 'movies', 'categories', 'countries', 'latest_movies', 'top_movies'));
        } else {
            abort(404);
        }
    }
    public function show_country($id)
    {
        $categories = Category::all();
        $countries = Country::all();
        $latest_movies = Movie::whereNotNull('name')->latest()
            ->limit(8)
            ->get();
            $top_movies = Movie::orderBy('rating', 'desc')->orderBy('views', 'desc')
            ->latest()
            ->limit(9)
            ->get();
        $movies = Movie::where('country_id', $id)->paginate(10);

        $country = Country::find($id);
        // dd($movies);
        if ($movies) {
            return view('country', compact('country', 'movies', 'categories', 'countries', 'latest_movies', 'top_movies'));
        } else {
            abort(404);
        }
    }

    public function show_favorite()
    {
        $categories = Category::all();
        $countries = Country::all();
        $latest_movies = Movie::whereNotNull('name')->latest()
            ->limit(8)
            ->get();
        $top_movies = Movie::orderBy('rating', 'desc')->orderBy('views', 'desc')
            ->latest()
            ->limit(9)
            ->get();
            // dd($top_movies);
        $movies = Movie::whereHas('users', function ($qu) {
            return $qu->where('user_id', auth()->user()->id);
        })->paginate(10);

        $related_movies = $movies->map(function ($movie) {
            return Movie::orderBy('rating', 'desc')->where('id', '!=', $movie->id)
                ->whereHas('categories', function ($query) use ($movie) {
                    return $query->whereIn('category_id', $movie->categories->pluck('id')->toArray());
                })
                ->limit(3)
                ->get();
        });
        $related = new Collection();

        foreach ($related_movies as $tag) {
            $related = $related->merge($tag);
        }

        // dd($related->unique());
        if ($movies) {
            return view('favorite', compact('movies', 'categories', 'countries', 'latest_movies', 'top_movies', 'related'));
        } else {
            abort(404);
        }
    }

    public function increment_views(Movie $movie)
    {
        $movie->increment('views');
    } // end of increment_views

    public function toggle_favorite(Movie $movie)
    {
        $movie->is_favored ? $movie->users()->detach(auth()->user()->id) : $movie->users()->attach(auth()->user()->id);
    } // end of toggle_favorite

    public function rateMovie(Request $request)
    {
        try {
            // dd(true);
            request()->validate(['rating' => 'required']);
            $project = Movie::find($request->id);
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating = $request->rating;
            // $rating->user_id = auth()->user()->id;
            // $movie->ratings()->save($rating);
            $project->rateOnce($rating->rating);
            // return redirect()->back();
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function download($id)
    {
        $movie = Movie::find($id);
        $path = '/storage/' . str_replace('public/', '', $movie->path);
        // dd(str_replace('public/', '', $movie->path));
        return response()->download(
            public_path() . $path,
            $movie->name
        );
    }
}
