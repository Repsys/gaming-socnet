@extends('layouts.template')

@section('title', 'Создание нового поста')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                <form method="POST" action="{{route('blog-create_post')}}">
                    @csrf
                    @include('components.alerts')
                    @include('components.form.input-field', [
                        'label' => 'Заголовок',
                        'name' => 'title'
                    ])
                    @include('components.form.textarea-field', [
                        'label' => 'Текст',
                        'name' => 'text',
                        'rows' => 10
                    ])
                    <div class="mt-4">
                        <a href="{{route('profile', ['login' => $account->login, 'content' => 'blog'])}}"
                           class="btn btn-secondary px-5 mr-2">Назад</a>
                        <button type="submit" class="btn btn-success px-5">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
