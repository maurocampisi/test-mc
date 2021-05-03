<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function list(Request $request) {

       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.punkapi.com/v2/beers');
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec ($ch);
        //$err = curl_error($ch); 
        curl_close ($ch);

        return response()->json(['list' => json_decode($response)]);
    }
}
