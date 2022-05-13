<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['prefix' => '/', 'middleware' => 'web'], function () {
    Route::post('register', 'UserController@register')->name('user.register');

    //Routes for MOVIE - CONNECTIONS OF GENRE BLADE TO CONTROLLER
    Route::get('movies', 'MoviesController@index')->name('user.movies');
    Route::post('movies', 'MoviesController@getMovie')->name('user.getMovies');
    Route::post('movies/view', 'MoviesController@viewMovie')->name('user.viewMovie');
    Route::get('movies/add', 'MoviesController@addMovie')->name('user.addMovie');
    Route::post('movies/save', 'MoviesController@saveMovie')->name('user.saveMovie');
    Route::post('movies/edit', 'MoviesController@editMovie')->name('user.editMovie');
    Route::post('movies/update', 'MoviesController@updateMovie')->name('user.updateMovie');
    Route::post('movies/delete', 'MoviesController@deleteMovie')->name('user.deleteMovie');
    Route::post('movies/search', 'MoviesController@search')->name('movies.search');

    //Routes for ACTOR - CONNECTIONS OF GENRE BLADE TO CONTROLLER
    Route::get('actors', 'ActorController@index')->name('user.actors');
    Route::post('actors', 'ActorController@getActor')->name('user.getActors');
    Route::post('Specific_Actor', 'ActorController@getSpecificActor')->name('user.getSpecificActor');
    Route::post('Specific_Actor/save', 'ActorController@saveSpecificActor')->name('user.saveSpecificActor');
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
    Route::post('producers/update', 'ProducerController@updateProducers')->name('user.updateProducers');
    Route::post('producers/delete', 'ProducerController@deleteProducer')->name('user.deleteProducer');
    Route::post('producers/search', 'ProducerController@search')->name('producer.search');
    
});

Route::get('/home', 'HomeController@index')->name('home');
