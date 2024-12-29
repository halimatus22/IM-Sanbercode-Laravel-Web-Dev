@extends('master')
@section('title')
Membuat Genre Baru
@endsection
@section('content')
<form action="/genre" method="POST">
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
    

    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection