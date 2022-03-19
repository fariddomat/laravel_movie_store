<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = Category::all();
        $countries = Country::all();
        $latest_movies = Movie::whereNotNull('name')
            ->latest()
            ->limit(6)
            ->get();
        $top_movies = Movie::orderBy('rating', 'desc')->orderBy('views', 'desc')
            ->latest()
            ->limit(9)
            ->get();

            return view('welcome', compact('categories', 'countries', 'latest_movies', 'top_movies'));
    }

    public function search()
    {
        if (request()->ajax()) {
            $values = Movie::whenSearch(request()->search)->get();
            return $values;
        }

        $categories = Category::all();
        $countries = Country::all();
        $latest_movies = Movie::whereNotNull('name')->latest()
            ->limit(6)
            ->get();
            $top_movies = Movie::orderBy('rating', 'desc')->orderBy('views', 'desc')
            ->latest()
            ->limit(9)
            ->get();

        return view('welcome', compact('categories', 'countries', 'latest_movies', 'top_movies'));
    }

    public function searchCategory()
    {
        if (request()->ajax()) {
            $values = Movie::whenCategory(request()->category)->whenSearch(request()->search)->get();
            return $values;
        }
    }

    public function searchCountry()
    {
        if (request()->ajax()) {
            $values = Movie::whenCountry(request()->country)->whenSearch(request()->search)->get();
            return $values;
        }
    }
}
