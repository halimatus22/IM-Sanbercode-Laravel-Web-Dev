<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
class ReviewController extends Controller
{
    public function store(Request $request, $film_id){
        $user_id = Auth::id();
        $request->validate([
            "content"=> "required",
            "point"=> "required"

        ],
    [
        "required"=> ":attribute tidak boleh kosong!"
    ]);
    Review::create([
        "content" => $request->input("content"),
        "point" => $request->input("point"),
        "user_id"=> $user_id,
        "film_id"=> $film_id
    ]);
    return redirect('/film/'.$film_id);
    }
}
