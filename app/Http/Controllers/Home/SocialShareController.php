<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;

class SocialShareController extends Controller
{
    public function index()

    {

        $shareButtons = \Share::page(
            'https://www.itsolutionstuff.com',
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();



        $movies = Movie::get();



        return view('socialshare', compact('shareButtons', 'movies'));

    }
}
