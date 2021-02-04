<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    protected function respondWithToken($token)
    {
        return response()->json([
        	'success'		=> true,
            'token' 		=> $token,
            'token_type' 	=> 'bearer',
            'expires_in' 	=> Auth::factory()->getTTL() * 360
        ], 200);
    }

    protected function respondFailed($message, $statusCode)
    {
    	return response()->json([
    		'success'	=> false,
    		'message'	=> $message
    	], $statusCode);
    }
}
