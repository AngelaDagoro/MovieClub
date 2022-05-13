<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Actor;
use App\Actormovie;

class ActorController extends Controller
{
    public function index()
    {
    	// return view('actors');
        return response()->json([
            'actors' => Actor::orderBy('id', 'DESC')->get()
        ],200);

    }

    public function getActor(Request $request) 
    {
    	$actor = Actor::orderBy('id', 'DESC')->get();
    	return json_encode($actor);
    }

    public function getSpecificActor($id)
    {
    	$actor = Actor::where('id', $id)->first();
    	// return json_encode($actor);
        return response()->json($actor,200);
    }

    public function savegetSpecificActor(Request $request){
        $actor = new Actormovie();
        $actor->actor_id = $request->actor_id;
        $actor->movie_id = $request->movie_id;
        $actor->save();

        return response()->json([
            "message" => "Actor Added Movie!"
        ], 200);
        
    }


    public function saveSpecificActor(Request $request)
    {
    	$actor = Actor::where('id', $request->id)->first();
    	$actor->firstname = $request->firstname;
    	$actor->lastname = $request->lastname;
    	$actor->age = $request->age;
    	$actor->gender = $request->gender;
        $actor->image = $request->image;
    	$actor->save();

    	// return json_encode(array("status"=>"OK"));
        Log::notice('Actor Updated', ['id'=>$actor->id,'firstname'=>$actor->firstname,'lastname'=>$actor->lastname,'age'=>$actor->age,'gender'=> $actor->gender,'image'=> $actor->image]);
        Storage::put('public/img/movies/'.$request->image,base64_decode($request->imageView7));
        return response()->json([
            "message" => "Actor updated!"
        ], 201);
    }

    public function addActor(Request $request)
    {
    	$actor = new Actor;
    	$actor->firstname = $request->firstname;
    	$actor->lastname = $request->lastname;
    	$actor->age = $request->age;
    	$actor->gender = $request->gender;
        $actor->image = $request->image;
    	$actor->save();

    	// return json_encode(array("status"=>"OK", "actor"=>$actor));
        Log::info('Actor:', ['id'=> $actor->id,'firstname'=> $actor->firstname, 'lastname'=> $actor->lastname, 'age'=> $actor->age,'gender'=> $actor->gender,'image'=> $actor->image]);
        Storage::put('public/img/movies/'.$request->image,base64_decode($request->imageView7));
        
        return response()->json([
            "message" => "Actor Added"
        ], 201);

       
    }

    public function deleteActor(Request $request)
    {
        $actor = Actor::where('id', $request->id)->first();
        $actor->delete();

        // return json_encode(array("status"=>"OK", "actor"=>$actor));
        Log::warning('Actor Deleted', [
            'id'=>$actor->id
        ]);

        return response()->json([
            "message" => "Actor deleted!"
        ], 202);
    }

    public function search(Request $request)
    {
        $actor = Actor::where('id', 'LIKE', "%$request->search%")->orwhere('firstname', 'LIKE', "%$request->search%")->orwhere('lastname', 'LIKE', "%$request->search%")->orwhere('age', 'LIKE', "%$request->search%")->orwhere('gender', 'LIKE', "%$request->search%")->get();

        return json_encode($actor);
    }
}
