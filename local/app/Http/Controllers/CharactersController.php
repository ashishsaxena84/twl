<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function listing(Request $request)
    {
        $string = '?';
        $urlstring = '&';
        if(isset($request->page)){
            $string .= 'page='.$request->page;
            $page = $request->page;
            $nexpage = $page+1;
            $prepage = $page-1;
            $curpage = $page;
        }else{
            $page    = '';
            $nexpage = 2;
            $prepage = '';
            $curpage = 1;
        }
        $keyword = "";
        $species = "";
        if($request->keyword){
            $string .= 'name='.$request->keyword."&";
            $urlstring .= 'name='.$request->keyword;
            $keyword  = $request->keyword;
        }
        if($request->species){
            $string .= 'species='.$request->species."&";
            $urlstring .= 'species='.$request->species;
            $species  = $request->species;
        }
        
        $url = 'https://rickandmortyapi.com/api/character/'.$string;
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        
        $output = json_decode($response,true);
        
        //return $output;
        
        if($output['info']['next']!=NULL){
            if($c = preg_match("~\?page=([0-9]+)~si", $output['info']['next'], $matches)){
    		    $nexpage = $matches[1];
    		}else{
    		    $nexpage = '';
    		}
    
    		if($curpage>=$output['info']['pages']){
    		    $nexpage = '';
    		}
        }else{
            $nexpage = '';
        }
        
        
        $output['info']['nexpage'] = $nexpage ;
        $output['info']['prepage'] = $prepage;
        $output['info']['curpage'] = $curpage;
        $output['info']['totpage'] = $output['info']['pages'];
        $output['info']['urlstr']  = $urlstring;
        $output['info']['keyword']  = $keyword;
        $output['info']['species']  = $species;
        
        //return $output;

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
