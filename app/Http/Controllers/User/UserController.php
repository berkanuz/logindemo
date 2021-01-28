<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;


class UserController extends Controller
{
    public function getUser(Request $request)
    {
    	$user = $request->user();
    	return response()->json($user,200);
    }

	public function updateName(Request $request, $id)
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

 	public function guzzleRequest(Request $request)
 	{
 		$baseURL = 'https://arf-transfer-test.arf.one/';
 		$path = 'api/v1/fx-rate';

 		$client = new Client;
		$request = $client->request('GET', $baseURL.$path ,
		 [ //https://arf-transfer-test.arf.one/api/v1/fx-rate?from=EUR&to=TRY
	        'query' => [
		        'from' => 'EUR', 
		        'to'=> 'TRY'
	        ]
		 ]);
		$response = json_decode($request->getBody(), true);
		$data = $response['result']['data'];
		return response()->json($data,200);
 	}
 	/*public function deneme(Request $request)
 	{
 		

 		$client = new Client;
 		
		$response = $client->request('GET', 'http://localhost/laravel/logindemo/public/api/user' ,
		 [ //https://arf-transfer-test.arf.one/api/v1/fx-rate?from=EUR&to=TRY
	        
		        'Authorization' => 'Bearer'.$request->bearerToken()
	        		   
		 ]);
		return $request->user();

		
 	}*/


}
