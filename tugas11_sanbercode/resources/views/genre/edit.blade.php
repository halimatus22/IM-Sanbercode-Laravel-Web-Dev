@extends('master')
@section('title')
Update
@endsection
@section('content')
<form action="/genre/{{$genre->id}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{old('name',$genre->name)}}">
        @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection