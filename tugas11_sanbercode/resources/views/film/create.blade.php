@extends('master')
@section('title')
Membuat film Baru
@endsection
@section('content')
<form action="/film" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="release_year">Release Year</label>
        <input type="number" class="form-control" name="release_year" id="release_year" placeholder="Enter release year">
        @error('release_year')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="summary">Summary</label>
        <br>
        <textarea name="summary" rows="10" cols="30"></textarea><br><br>
        @error('summary')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="poster">Poster</label>
        <input type="file"  class="form-control" name="poster" id="poster" placeholder="Enter poster">
        @error('poster')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="genre_id">Genre</label>
        <select name="genre_id" class="form-control">
            <option value="">----Pilih Genre------</option>
            @forelse($genre as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @empty
            <option value="">Belum ada kategori</option>
            @endforelse
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection