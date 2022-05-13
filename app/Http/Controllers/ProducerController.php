<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Producer;

class ProducerController extends Controller
{
    public function index()
    {
    	// return view('producer');
        return response()->json([
            'producers' => Producer::orderBy('id', 'DESC')->get()
        ],200);
    }

    public function getProducers(Request $request)
    {
    	$producer = Producer::orderBy('id', 'DESC')->get();
    	return json_encode($producer);
    }

    public function saveProducers(Request $request) 
    {
    	$producer = new Producer;
    	$producer->firstname = $request->firstname;
    	$producer->lastname = $request->lastname;
    	$producer->age = $request->age;

    	$producer->save();

    	// return json_encode(array("status"=>"OK", "producer"=>$producer));
        // $producer = Producer::create();

        Log::info('Producer:', ['id'=> $producer->id,'firstname'=> $producer->firstname, 'lastname'=> $producer->lastname, 'age'=> $producer->age]);
        return response()->json([
            "message" => "producer Added"
        ], 201);

    }

    public function editProducer(Request $request)
    {
    	$producer = Producer::where('id', $request->id)->first();
    	// return json_encode(array("status"=>"OK", "producer"=>$producer));
        return response()->json($producer,200);
    }

    public function updateProducers(Request $request)
    {
    	$producer = Producer::where('id', $request->id)->first();
    	$producer->firstname = $request->firstname;
    	$producer->lastname = $request->lastname;
    	$producer->age = $request->age;
    	$producer->save();

    	// return json_encode(array("status"=>"OK"));
        Log::notice('Producer Updated', ['id'=>$producer->id,'firstname'=>$producer->firstname,'lastname'=>$producer->lastname,'age'=>$producer->age]);
        return response()->json([
            "message" => "Producer updated!"
        ], 201);

    }

    public function deleteProducer(Request $request)
    {
    	$producer = Producer::where('id', $request->id)->first();
    	$producer->delete();

    	// return json_encode(array("status"=>"OK", "producerid"=>$producer->id));

        Log::warning('Producer Deleted', [
            'id'=>$producer->id
        ]);

        return response()->json([
            "message" => "Producer deleted!"
        ], 202);
    }

    public function search(Request $request)
    {
        $producer = Producer::where('id', 'LIKE', "%$request->search%")->orwhere('firstname', 'LIKE', "%$request->search%")->orwhere('lastname', 'LIKE', "%$request->search%")->orwhere('age', 'LIKE', "%$request->search%")->get();

        return json_encode($producer);
    }
}
