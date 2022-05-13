<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenreController extends Controller
{
    public function index()
    {
        
    	// return view('genre');
        return response()->json([
            'genres' => Genre::orderBy('id', 'DESC')->get()
        ],200);
    }

    public function getGenres(Request $request)
    {
    	$genre = Genre::orderBy('id', 'DESC')->get();
    	return json_encode($genre);
    }

    public function saveGenres(Request $request)
    {
    	$genre = new Genre;
    	$genre->name = $request->name;
    	$genre->save();

    	return json_encode(array("status"=>"OK", "genre"=>$genre));
    }

    public function editGenres(Request $request)
    {
    	$genre = Genre::where('id', $request->id)->first();
    	return json_encode(array("status"=>"OK", "genre"=>$genre));
    }

    public function updateGenres(Request $request)
    {
    	$genre = Genre::where('id', $request->id)->first();
    	$genre->name = $request->names;
    	$genre->save();

    	return json_encode(array("status"=>"OK"));
    }

    public function deleteGenres(Request $request)
    {
    	$genre = Genre::where('id', $request->id)->first();
    	$genre->delete();

    	return json_encode(array("status"=>"OK", "genre"=>$genre->name));
    }

    public function search(Request $request)
    {
        $genre = Genre::where('id', 'LIKE', "%$request->search%")->orwhere('name', 'LIKE', "%$request->search%")->get();

        return json_encode($genre);
    }
}
