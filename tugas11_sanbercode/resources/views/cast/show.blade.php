@extends('master')
@section('title')
    Menampilkan {{$cast->name}} 
@endsection
@section('content')
    <a > {{$cast->bio}}</a>
    <a > {{$cast->age}}</a>
@endsection