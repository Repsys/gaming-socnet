@extends('layouts.template')

@section('title', 'Пост "'.$post->title.'"')

@include('components.back-btn',[
    'url' => route('profile', ['login' => $account->login, 'content' => 'blog'])
])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark shadow blogpost-card mb-4 bg-transparent">
                    <img class="card-img-top blog-image"
                         src="{{Storage::url('blog/previews/'.$post->image)}}"
                         alt="{{$post->image}}">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <pre class="card-text">{{$post->text}}</pre>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <small class="text-muted-light">{{$post->created_at}}</small>
                        @include('components.avatar-small', ['account' => $post->account])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
