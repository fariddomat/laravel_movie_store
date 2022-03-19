<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_countries')->only(['index']);
        $this->middleware('permission:create_countries')->only(['create','store']);
        $this->middleware('permission:update_countries')->only(['edit','update']);
        $this->middleware('permission:delete_countries')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::orderBy('name', 'asc')->whenSearch(request()->search)
            ->withCount('movies')
            ->paginate(5);
        return view('admin.countries.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:countries,name'
        ]);
        Country::create($request->all());
        Session::flash('success','Successfully Created !');
        return redirect()->route('admin.countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country=Country::find($id);
        return view('admin.countries.edit',compact('country'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:countries,name,' . $id
        ]);
        $country=Country::find($id);

        $country->update($request->all());

        Session::flash('success','Successfully updated !');
        return redirect()->route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country=Country::find($id);
        $country->delete();

        Session::flash('success','Successfully deleted !');
        return redirect()->route('admin.countries.index');
    }
}
