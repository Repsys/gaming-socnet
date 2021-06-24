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
                        @include('components.author', ['account' => $post->account])
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 px-4">
                <h3>Комментарии</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                @if(isset($post->comments) and !$post->comments->isEmpty())
                    <ul class="list-group shadow">
                        @foreach($post->comments as $comment)
                            @include('components.answer', [
                                'account' => $comment->account,
                                'text' => $comment->text,
                                'created_at' => $comment->created_at
                            ])
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">
                        Нет ни одного комментария :(
                    </p>
                @endif
            </div>
        </div>
        @can('create-blog-comment', $post)
            <div class="row mt-5">
                <div class="col-12 mx-auto">
                    @include('components.alerts')
                    <form method="POST" action="{{route('blog-comment-create_post', [
                            'login' => $account->login,
                            'id' => $post->id
                        ])}}">
                        @csrf
                        @include('components.form.textarea-field', [
                            'label' => 'Добавить комментарий',
                            'name' => 'text',
                            'htmlRequired' => true,
                            'rows' => 5,
                            'max' => 500
                        ])
                        <div class="mt-4">
                            <button type="submit" class="add-comment-btn btn btn-success px-5">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan
    </div>
@endsection
