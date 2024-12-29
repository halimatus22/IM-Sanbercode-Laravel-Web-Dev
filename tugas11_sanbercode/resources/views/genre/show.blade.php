@extends('master')
@section('title')
    Menampilkan genre {{$genre->name}}
@endsection
@section('content')
    <h5 class="mt-3">List Film</h5>
    <div class="row">
                @forelse ($genre->listFilm as $value)
                    <div class="col-4 m-2" >
                        <div class="card mb-2">
                            <img src="{{asset('uploads/'.$value->poster)}}" width="300px" class="mx-auto" alt="...">
                            <div class="card-body">
                                <h3>{{$value->title}}</h3>
                                <p class="card-text">{{Str::limit($value->summary ,50)}}</p>
                                <div class="flex flex-between">
                                <a href="/film/{{$value->id}}" class="btn btn-primary btn-sm btn-block">lihat selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
            @empty
                <h5>tidak ada data</h5>
            @endforelse
</div>
@endsection