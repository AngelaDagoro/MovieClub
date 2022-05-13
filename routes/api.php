<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', 'PassportController@login');
Route::post('logout', 'PassportController@logout');
Route::post('register', 'PassportController@register')->middleware('api');

Route::middleware('auth:api')->group(function() {
    Route::get('user', 'PassportController@details');

    // Movies
    //Routes for MOVIE - CONNECTIONS OF GENRE BLADE TO CONTROLLER
    Route::get('movies', 'MoviesController@index')->name('user.movies');
    Route::post('movies', 'MoviesController@getMovie')->name('user.getMovies');
    Route::post('movies/view', 'MoviesController@viewMovie')->name('user.viewMovie');
    Route::get('movies/add', 'MoviesController@addMovie')->name('user.addMovie');
    Route::post('movies/save', 'MoviesController@saveMovie')->name('user.saveMovie');
    Route::post('movies/edit', 'MoviesController@editMovie')->name('user.editMovie');
    Route::put('movies/update', 'MoviesController@updateMovie')->name('user.updateMovie');
    Route::post('movies/delete', 'MoviesController@deleteMovie')->name('user.deleteMovie');
    Route::post('movies/search', 'MoviesController@search')->name('movies.search');

    Route::get('movies/showactor/{id}', 'MoviesController@showactorm')->name('user.showactorm');
    Route::get('movies/showmovie/{id}', 'MoviesController@showmoviea')->name('user.showmoviea');
    //Routes for ACTOR - CONNECTIONS OF GENRE BLADE TO CONTROLLER
    Route::get('actors', 'ActorController@index')->name('user.actors');
    Route::post('actors', 'ActorController@getActor')->name('user.getActors');

    Route::get('Specific_Actor/{id}', 'ActorController@getSpecificActor')->name('user.getSpecificActor');
    Route::post('Specific_Actor/saveactor', 'ActorController@savegetSpecificActor')->name('user.savegetSpecificActor');

    Route::put('Specific_Actor/save', 'ActorController@saveSpecificActor')->name('user.saveSpecificActor');
    Route::post('Specific_Actor/add', 'ActorController@addActor')->name('user.addActor');
    Route::post('Specific_Actor/delete', 'ActorController@deleteActor')->name('user.deleteActor');
    Route::post('actors/search', 'ActorController@search')->name('actor.search');


    //Routes for Genres - CONNECTIONS OF GENRE BLADE TO CONTROLLER
    Route::get('genres', 'GenreController@index')->name('user.genre');
    Route::post('genres', 'GenreController@getGenres')->name('user.getGenres');
    Route::post('genres/save', 'GenreController@saveGenres')->name('user.saveGenres');
    Route::post('genres/edit', 'GenreController@editGenres')->name('user.editGenres');
    Route::post('genres/update', 'GenreController@updateGenres')->name('user.updateGenres');
    Route::post('genres/delete', 'GenreController@deleteGenres')->name('user.deleteGenres');
    Route::post('genres/search', 'GenreController@search')->name('genre.search');

    //Routes for PRODUCER - CONNECTIONS OF GENRE BLADE TO CONTROLLER
    Route::get('producers', 'ProducerController@index')->name('user.producers');
    Route::post('producers', 'ProducerController@getProducers')->name('user.getProducers');
    Route::post('producers/save', 'ProducerController@saveProducers')->name('user.saveProducers');
    Route::post('producers/edit', 'ProducerController@editProducer')->name('user.editProducer');
    Route::put('producers/update', 'ProducerController@updateProducers')->name('user.updateProducers');
    Route::post('producers/delete', 'ProducerController@deleteProducer')->name('user.deleteProducer');
    Route::post('producers/search', 'ProducerController@search')->name('producer.search');
    
});

 