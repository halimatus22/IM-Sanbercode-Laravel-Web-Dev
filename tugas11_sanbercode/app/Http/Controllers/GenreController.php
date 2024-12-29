<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genre = Genre::all();
        return view("genre.index", compact("genre"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("genre.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
            ],
        [
            'required'=>':attribute tidak boleh kosong!!'
        ]);
        $genre = new Genre;
        $genre->name = $validated['name'];
        $genre->save();
        return redirect('/genre');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $genre = Genre::find($id);
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::find($id)->first();
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required'
            ],
        [
            'required'=>':attribute tidak boleh kosong!!'
        ]);
        $genre = Genre::find($id);
        $genre->name = $validated['name'];
        $genre->save();
        return redirect('/genre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::find($id);
        $genre->delete();
        return redirect('/genre');
    }
}
