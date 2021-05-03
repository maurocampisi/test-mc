<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        
        $request->validate([
            'username' => 'required', 
            'password' => 'required'
        ]);
    
        if( Auth::attempt(['email'=>$request->username, 'password'=>$request->password]) ) {
            $auth = Auth::user();
            $accessToken = $auth->createToken($auth->email.'-'.now())->accessToken;
                    
            return response()->json([
                'token' => $accessToken
            ]);
        }
        return response()->json(['error' => ['message' => 'Invalid login credentials!']]);

    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();

        return response()->json(['message' => 'Logged out!']);
    }
}
