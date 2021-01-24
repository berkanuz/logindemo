<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function getUser(Request $request)
    {
    	$user = $request->user();
    	return response()->json($user,200);
    }

public function updateUser(Request $request, $id)
    {
    	$new_name = $request ->get('new_name');
    	$user = User::where('id',$id) -> first();
    	$user -> name = $new_name;
    	$user->save();
    	return response() -> json($user,200);

	}
public function updatePassword(Request $request , $id)
	{
		$new_password = $request -> get('new_password');
		$user = User::where('id',$id) -> first();
		$user -> password= Hash::make($new_password);
		$user -> save();
		return response() -> json($user,200);
	}



}
