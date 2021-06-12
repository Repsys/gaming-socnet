@extends('layouts.template')

@section('title', 'Форум - Создание нового раздела')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                <form method="POST" action="{{route('forum-section-create_post', ['domain' => $project->domain])}}">
                    @csrf
                    @include('components.alerts')
                    @include('components.form.input-field', [
                        'label' => 'Название',
                        'name' => 'title',
                        'required' => true
                    ])
                    @include('components.form.textarea-field', [
                        'label' => 'Описание',
                        'name' => 'about',
                        'required' => true,
                        'rows' => 5,
                        'max' => 500
                    ])
                    <div class="mt-4">
                        <a href="{{route('project', ['domain' => $project->domain, 'content' => 'forum'])}}"
                           class="btn btn-secondary px-5 mr-2">Назад</a>
                        <button type="submit" class="btn btn-success px-5">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
