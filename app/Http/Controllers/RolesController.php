<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roletype;
class RolesController extends Controller
{
    
    public function index() 
    {
    	return view('roletype');
    }

    public function getAllRoles(Request $request) 
    {
    	$role = Roletype::orderBy('id', 'DESC')->get();
    	return json_encode($role);
    }

    public function saveRole(Request $request)
    {
    	$role = new Roletype;  
    	$role->role = $request->role;
    	$role->save();

    	return response()->json($role);
    }


    public function editRole(Request $request)
    {
    	$role = Roletype::where('id', $request->role_id)->first();
    	return response()->json($role);
    }

    public function updateRole(Request $request)
    {
    	$role = Roletype::where('id', $request->Rid)->first();
    	$role->role = $request->Rname;
    	$role->save();

    	return response()->json($role);
    }

    public function deleteRole(Request $request)
    {
        $role = Roletype::where('id', $request->role_id)->first();
        $role->delete();

        return response()->json($role);
    }

    public function searchRoles(Request $request)
    {
        $genre = Roletype::where('id', 'LIKE', "%$request->search%")->orwhere('role', 'LIKE', "%$request->search%")->get();

        return json_encode($genre);
    }
    
}
