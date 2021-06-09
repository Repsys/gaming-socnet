@extends('layouts.template')

@section('title', 'Пост "'.$post->title.'"')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark shadow blogpost-card mb-4 bg-transparent">
                    <img class="card-img-top blog-image" src="https://i.redd.it/jwanbica21w41.jpg"
                         alt="Image">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <p class="card-text">{{$post->text}}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text m-0"><small class="text-muted-light">{{$post->created_at}}</small></p>
                        <p class="card-text m-0"><small class="text-muted-light">Автор - {{$fullName}}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
