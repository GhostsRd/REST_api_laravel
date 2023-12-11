<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Meteo extends Controller
{
    

    public function index(){
        // $resultats = Http::get("https://api.openweathermap.org/data/2.5/weather?q=fianarantsoa&appid=3759656489a1770faacb43af43cb78ca")
        //     ->json();
        //     dd($resultats);

        return view('welcome',[
            'resultats' => Http::get("https://api.openweathermap.org/data/2.5/weather?q=fianarantsoa&appid=3759656489a1770faacb43af43cb78ca")
            ->json(),
        ]);
    }
    public function search(Request $request){
        // $resultats = Http::get("https://api.openweathermap.org/data/2.5/weather?q=fianarantsoa&appid=3759656489a1770faacb43af43cb78ca")
        //     ->json();
        //     dd($resultats);
        $resultats = Http::get("https://api.openweathermap.org/data/2.5/weather?q=".$request->ville."&appid=3759656489a1770faacb43af43cb78ca")
        ->json();
        if($resultats['cod'] != 200){
            return view("welcome",[
                "message" => "not found this ville",
            ]);
        }else{

            return view('welcome',[
                "resultats" => Http::get("https://api.openweathermap.org/data/2.5/weather?q=".$request->ville."&appid=3759656489a1770faacb43af43cb78ca")
                ->json(),
            ]);
        }

    }
}
