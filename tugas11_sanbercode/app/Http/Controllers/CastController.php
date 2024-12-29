<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    public function create(){
        return view('cast.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'age'=>'required'
        ]);
        $query = DB::table('casts')->insert([
            "name" => $request["name"],
            "bio" => $request["bio"],
            "age"=>$request["age"]
        ]);
        return redirect('/cast');
    }
    public function index()
    {
        $cast = DB::table('casts')->get();
        return view('cast.index', compact('cast'));
    }
    public function show($id)
    {
        $cast = DB::table('casts')->where('id', $id)->first();
        return view('cast.show', compact('cast'));
    }
    public function edit($id){
        $cast = DB::table('cast')->where('id', $id)->first();
        return view('cast.edit', compact('cast'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'age'=>'required'
        ]);
        $query = DB::table('casts')->where('id',$id)->update([
            "name" => $request["name"],
            "bio" => $request["bio"],
            "age"=>$request["age"]
        ]);
        return redirect('/cast');
    }
    public function destroy($id)
    {
        $query = DB::table('casts')->where('id', $id)->delete();
        return redirect('/cast');
    }
}
