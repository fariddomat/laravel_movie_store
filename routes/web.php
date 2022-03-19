<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/searchCategory', 'HomeController@searchCategory')->name('searchCategory');
Route::get('/searchCountry', 'HomeController@searchCountry')->name('searchCountry');

Route::get('/movie/{id}', 'Home\MovieController@show')->name('movie.show');
Route::get('/category/{id}', 'Home\MovieController@show_category')->name('movie.category');
Route::get('/country/{id}', 'Home\MovieController@show_country')->name('movie.country');


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/favorite', 'Home\MovieController@show_favorite')->name('movie.favorite');

    Route::post('/comment/store', 'CommentController@store')->name('comment.add');
    Route::post('/comment/replyStore', 'CommentController@replyStore')->name('comment.reply');
    Route::get('/comment/destroy/{id}', 'CommentController@destroy')->name('comment.destroy');
    Route::get('/comment/report/{id}', 'CommentController@report')->name('comment.report');

    //rating
    Route::post('/movies/rateMovie', 'Home\MovieController@rateMovie')->name('movies.rateMovie');

    //toggle_favorite
    Route::post('/movies/{movie}/toggle_favorite', 'Home\MovieController@toggle_favorite')->name('movies.toggle_favorite');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/movies/{movie}/increment_views', 'Home\MovieController@increment_views')->name('movies.increment_views');


// increment_views
Route::post('/movies/{movie}/increment_views', 'Home\MovieController@increment_views')->name('movies.increment_views');


Route::get('/download/{id}', 'Home\MovieController@download')->name('download');

Route::get('social-share', 'Home\SocialShareController@index');
