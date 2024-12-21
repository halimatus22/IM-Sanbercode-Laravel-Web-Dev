@extends('master')
@section('title')
Membuat Cast Baru
@endsection
@section('content')
<form action="/cast" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
        @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" name="age" id="age" placeholder="Enter Age">
        @error('age')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="bio">Bio</label>
        <br><br>
        <textarea name="bio" rows="10" cols="30"></textarea><br><br>
        @error('bio')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection