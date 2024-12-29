@extends('master')
@section('title')
    Menampilkan film {{$film->title}} 
@endsection
@section('content')
<img src="{{asset('uploads/'.$film->poster)}}" alt="" width="100%" height="300px">
    <div class="badge badge-light text-gray m-3" > {{$film->release_year}}</div>
    <div class="badge badge-danger m-3" > {{$film->genre->name}}</div>
    <p class="ml-3"> {{$film->summary}}</p>
    <h5 class="mt-3">List Review</h5>
    <div class="row">
                @forelse ($film->listReview as $value)
                    <div class="col-4 m-2" >
                        <div class="card mb-2">
                            <div class="card-header">
                            <label>{{$value->createBy->name}}</label>
                            </div>
                        
                        <div class="card-body ">
                        <h3>point {{$value->point}}</h3>
                                <p class="card-text">{{$value->content}}</p>
                                <div class="flex flex-between">
                        </div>
                                
                        </div>
                    </div>
            @empty
                <h5>tidak ada data</h5>
            @endforelse
    </div>
    @auth
    <div class="card  p-2 mt-2">
    <form action="/review/{{$film->id}}" method="post"> 
        @csrf
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" cols="20" rows="10" placeholder="Isi Content"></textarea>
        </div>
        <div class="form-group">
            <label>Point</label>
            <input type="number" name="point" class="form-control" cols="20" rows="10" placeholder="Isi Content">
        </div>
        <input type="submit" value="Kirim" class="btn btn-primary btn-sm  btn-block">
    </form>
    @endauth
    </div>
    
@endsection