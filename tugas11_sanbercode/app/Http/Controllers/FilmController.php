<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();
        return view("film.index", compact("film"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()        
    {
        $genre = Genre::all();
        return view("film.create", compact("genre"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'release_year'=> 'required | min:4 | max:4',
            'summary'=> 'required',
            'poster'=> 'required|image|mimes:png,jpg,jpeg',
            'genre_id'=> 'required'
            ],
        [
            'required' => ':attribute tidak boleh kosong !',
            'exists' => 'Inputan :attribute tidak ada di resource.',
            'image' => ':attriute harus berupa gambar'

            ]);
            $newImageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('uploads'), $newImageName);
            $film = new Film;
            $film->title = $validated['title'];
            $film->release_year = $validated['release_year'];
            $film->summary = $validated['summary'];
            $film->poster = $newImageName;
            $film->genre_id = $validated['genre_id'];

            $film->save();
            return redirect('/film');
        }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::find($id)->first();
        return view('film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::all();
        $film = Film::find($id);
        return view('film.edit', compact('film','genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'release_year'=> 'required | min:4 | max:4',
            'summary'=> 'required',
            'poster'=> 'image|mimes:png,jpg,jpeg',
            'genre_id'=> 'required'
            ],
        [
            'required' => ':attribute tidak boleh kosong !',
            'exists' => 'Inputan :attribute tidak ada di resource.',
            'image' => ':attriute harus berupa gambar'

            ]);
            $film= Film::find($id);
            if($request->has('poster')){
                File::delete('uploads/'.$film->poster);
                $newImageName = time() . '.' . $request->poster->extension();
                $request->poster->move(public_path('uploads'), $newImageName);
                $film->poster = $newImageName;
            }
            $film->title = $validated['title'];
            $film->release_year = $validated['release_year'];
            $film->summary = $validated['summary'];
            $film->genre_id = $validated['genre_id'];
            $film->save();
            return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);
        if($film->poster){
            File::delete('uploads/'.$film->poster);
        }
        $film->delete();
        return redirect('/film');
    }
}
