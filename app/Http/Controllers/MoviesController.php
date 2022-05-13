<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Movie;
use App\Actor;
use App\Genre;
use App\Producer;
use DB;
use Image;
use App\Actormovie;

class MoviesController extends Controller
{
    public function index() 
    {
        //TO VIEW MOVIE BLADE
    	// return view('movies');

        return response()->json([
            'movies' => Movie::orderBy('id', 'DESC')->get()
        ],200);
        
        // return response()->json([
        //     'movies' =>  Movie::with('producer')->with('genre')->with('actor')->orderBy('id', 'DESC')->get()
        // ],200);
        
    }

    public function getMovie(Request $request) 
    {
        //TO FETCH MOVIE FROM DATABASE
        $movie = Movie::with('producer')->with('genre')->with('actor')->orderBy('id', 'DESC')->get();
    	return json_encode($movie);
    }

    public function viewMovie(Request $request)
    {
        //TO SHOW DATA OF THE SELECTED MOVIE IN VIEW MODAL
        $movie = Movie::where('id', $request->id)->with('producer')->with('genre')->with('actor')->first();
        return json_encode($movie);
    }

    public function addMovie() 
    {
        //TO FETCH DATA FROM ANOTHER TABLE
        $actor = Actor::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $producer = Producer::orderBy('id', 'DESC')->get();

        $data = [];
        $data[0] = $actor;
        $data[1] = $genre;
        $data[2] = $producer;
        return json_encode($data);
    }

    public function saveMovie(Request $request)
    {

        $movie = new Movie;
        $movie->title = $request->title;
        $movie->producer_id = $request->producer;
        $movie->genre_id = $request->genre;
        $movie->content = $request->content;
        $movie->date_release = $request->date_release;
        $movie->country_release = $request->country_release;
        $movie->img = $request->image;
        $movie->save();

        Log::info('Movie:', ['id'=> $movie->id,'title'=> $movie->title, 'producer_id'=> $movie->producer, 'genre_id'=> $movie->genre,'content'=> $movie->content, 'date_release'=> $movie->date_release,'country_release'=> $movie->country_release,'img'=> $movie->image]);
        Storage::put('public/img/movies/'.$request->image,base64_decode($request->imgMovie));
        
        return response()->json([
            "message" => "Movie Added"
        ], 201);


        // TO SAVE ADDED MOVIE
        // $avatar = $request->file('avatar');
        // $filename     = time() . '.' . $avatar->getClientOriginalExtension();
        // Image::make($avatar)->resize(600,898)->save( public_path('img/movies/' . $filename) );

        // // if($request->hasFile('avatar')) {
        //    / $movie = new Movie;
        //     $movie->title = $request->ftitle;
        //     $movie->producer_id = $request->prod;
        //     $movie->genre_id = $request->gen;
        //     $movie->content = $request->cont;
        //     $movie->date_release = $request->dRelease;
        //     $movie->country_release = $request->cRelease;
        //     $movie->img = $filename;
        //     $movie->save();

        //     $cnt = count($request->actorid);
        //     for($i = 0; $i < $cnt; $i++) {
        //         $movieactors = [
        //                 'movie_id' => $movie->id,
        //                 'actor_id' => $request->actorid[$i]
        //         ];
        //         DB::table('movie_actor')->insert($movieactors);
        //     }
        //     return json_encode(array("status"=>"OK", "movie"=>$movie));
        // }
        // else {
        //     return json_encode(array("status"=>"error", "movie"=>"Please select Image"));
        // }

      

    }

    public function editMovie(Request $request) 
    {
        //TO FETCH DATA OF THE SELECTED MOVIE
        $actor = Actor::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $producer = Producer::orderBy('id', 'DESC')->get();
        $movie = Movie::where('id', $request->id)->with('producer')->with('genre')->with('actor')->first();

        $data = [];
        $data[0] = $actor;
        $data[1] = $genre;
        $data[2] = $producer;
        $data[3] = $movie;
        return json_encode($data);
    }

    public function updateMovie(Request $request) 
    {

            $movie = Movie::where('id', $request->id)->first();
            $movie->title = $request->title;
            $movie->producer_id = $request->producer;
            $movie->genre_id = $request->genre;
            $movie->content = $request->content;
            $movie->date_release = $request->date_release;
            $movie->country_release = $request->country_release;
            $movie->img = $request->image;
    
            $movie->save();

            Log::info('Movie:', ['id'=> $movie->id,'title'=> $movie->title, 'producer_id'=> $movie->producer, 'genre_id'=> $movie->genre,'content'=> $movie->content, 'date_release'=> $movie->date_release,'country_release'=> $movie->country_release,'img'=> $movie->image]);
            Storage::put('public/img/movies/'.$request->image,base64_decode($request->imgMovie));
            
            return response()->json([
                "message" => "Movie Updated"
            ], 201);

        // //TO SAVE OR UPDATE THE EDITED MOVIE
        // if($request->hasFile('movieavatar')) {
        //     $avatar = $request->file('movieavatar');
        //     $filename     = time() . '.' . $avatar->getClientOriginalExtension();
        //     Image::make($avatar)->resize(600,898)->save( public_path('img/movies/' . $filename) );

        //     $movie = Movie::where('id', $request->movieid)->first();
        //     $movie->title = $request->movietitle;
        //     $movie->producer_id = $request->mprod;
        //     $movie->genre_id = $request->mgen;
        //     $movie->content = $request->mcont;
        //     $movie->date_release = $request->mdRelease;
        //     $movie->country_release = $request->mcRelease;
        //     $movie->img = $filename;
        //     $movie->save();

        //     $cnt = count($request->movieactorid);
        //     $actormovie = Actormovie::where('movie_id', $request->movieid)->delete();
        //     for($i = 0; $i < $cnt; $i++) {
        //         $movieactors = [
        //             'movie_id' => $movie->id,
        //             'actor_id' => $request->movieactorid[$i]
        //         ];
        //         DB::table('movie_actor')->insert($movieactors);
        //     }
        //     return json_encode(array("status"=>"OK", "movie"=>$movie));
        // }//IF THE EDITED MOVIE DIDN'T CHANGE ITS PICTURE
        // else {
        //     $movie = Movie::where('id', $request->movieid)->first();
        //     $movie->title = $request->movietitle;
        //     $movie->producer_id = $request->mprod;
        //     $movie->genre_id = $request->mgen;
        //     $movie->content = $request->mcont;
        //     $movie->date_release = $request->mdRelease;
        //     $movie->country_release = $request->mcRelease;
        //     $movie->img = $request->oldmovieavatar;
        //     $movie->save();

        //     $cnt = count($request->movieactorid);
        //     $actormovie = Actormovie::where('movie_id', $request->movieid)->delete();
        //     for($i = 0; $i < $cnt; $i++) {
        //         $movieactors = [
        //             'movie_id' => $movie->id,
        //             'actor_id' => $request->movieactorid[$i]
        //         ];
        //         DB::table('movie_actor')->insert($movieactors);
        //     }
        //     return json_encode(array("status"=>"OK", "movie"=>$movie));
        // }
    }

    public function deleteMovie(Request $request)
    {
        //TO DELETE MOVIE FROM DATABASE
        // $actormovie = Actormovie::where('movie_id', $request->id)->delete();

        $movie = Movie::where('id', $request->id)->first();
        $movie->delete();

        // return json_encode(array("status"=>"OK", "movietitle"=>$movie->title));
        Log::warning('Movie Deleted', [
            'id'=>$movie->id
        ]);

        return response()->json([
            "message" => "Movie deleted!"
        ], 202);
    }

    public function search(Request $request)
    {
        $movie = Movie::where('title', 'LIKE', "%$request->search%")->get();

        return json_encode($movie);
    }

    public function showactorm($id){
        $actorm = Actormovie::with('actors')->where('movie_id', $id)->get();

        return response()->json([
            "actorm" => $actorm
        ], 202);

    }

    public function showmoviea($id){
        $moviea = Actormovie::with('movie')->where('actor_id', $id)->get();

        return response()->json([
            "moviea" => $moviea
        ], 202);

    }
}
