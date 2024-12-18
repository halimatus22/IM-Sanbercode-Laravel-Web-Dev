<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function welcome(Request $request){
        $firstname = $request["firstname"];
        $lastname = $request["lastname"];
        $gender = $request["gender"];
        $nationality= $request["nationality"];
        $language = $request["language"];
        $bio = $request["bio"];
        return view('welcome',['firstname'=>$firstname,
        'lastname'=>$lastname,'gender'=>$gender,
        'nationality'=>$nationality,'language'=>$language,'bio'=>$bio]);

    }
}
