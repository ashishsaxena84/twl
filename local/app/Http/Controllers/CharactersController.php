<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function listing(Request $request)
    {
        if(isset($request->key)){
            $url = 'https://rickandmortyapi.com/api/character/'.$page;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec ($ch);
            $err = curl_error($ch);  //if you need
            curl_close ($ch);
            
            $output = json_decode($response,true);
            
            return view('listing',compact('output'));
        }
        
        
        
        if(isset($request->page)){
            $page = '?page='.$request->page;
        }else{
            $page = '';
        }
        $url = 'https://rickandmortyapi.com/api/character/'.$page;
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        
    
        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        
        $output = json_decode($response,true);

        return view('listing',compact('output'));
    }
    
    
    
    public static function getEpisode($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        
        $output = json_decode($response,true);
 
        return $output['name'];
    }
}
