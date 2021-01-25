<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['The provided credentials are incorrect.']
            ], 500);
        }

        $userToken = $user->createToken('api-token')->plainTextToken;
    
        return response(['token' => $userToken], 200);
    }

    public function logout(Request $request)
    {

        $user = $request->user(); 
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();


        return response('', 200);
    }
}
