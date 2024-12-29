@extends('master')
@section('title')
Update
@endsection
@section('content')
<form action="/film/{{$film->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{old('title',$film->title)}}">
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="release_year">release year</label>
        <input type="number" class="form-control" name="release_year" id="release_year" value="{{old('release_year',$film->release_year)}}" >
        @error('release_year')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="summary">summary</label>
        <br><br>
        <textarea name="summary" rows="10" cols="30">{{old('summary',$film->summary)}}</textarea><br><br>
        @error('summary')
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
            @if ($item->id === $film->genre_id)
            <option value="{{$item->id}}" selected>{{$item->name}}</option>
            @else
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endif
            @empty
            <option value="">Belum ada kategori</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label for="poster">Poster</label>
        <input type="file"  class="form-control" name="poster" id="poster" placeholder="Enter poster">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection