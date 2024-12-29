@extends('master')
@section('title')
    Film
@endsection
@section('content')
@auth
<a href="/film/create" class="btn btn-primary" enctype="multipart/form-data">Tambah</a>

@endauth
        <div class="row">
                @forelse ($film as $key=>$value)
                    <div class="col-4 m-2" >
                        <div class="card mb-2">
                            <img src="{{asset('uploads/'.$value->poster)}}" width="300px" class="mx-auto" alt="...">
                            <div class="card-body">
                                <h3>{{$value->title}}</h3>
                                <a class="badge badge-light"> {{$value->genre->name}}</a>
                                <p class="card-text">{{Str::limit($value->summary ,50)}}</p>
                                <div class="flex flex-between">
                                <a href="/film/{{$value->id}}" class="btn btn-primary btn-sm btn-block">lihat selengkapnya</a>
                                @auth
                                <div class="row mt-3">
                                    <div class="col">
                                    <a href="/film/{{$value->id}}/edit" class="btn btn-warning btn-sm btn-block">Edit</a>  
                                    </div>
                                    <div class="col">
                                        <form action="/film/{{$value->id}}" method="POST" onsubmit="return confirm('are you sure delete data?')" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-block " >Delete</button>
                                        </form>

                                    </div>
                                </div>
                                @endauth

                                </div>
                                </div>
                                </div>
                    </div>
                @empty
                    <tr colspan="3">
                        <td>No data</td>
                    </tr>  
                @endforelse              
            </tbody>
        </table>
@endsection