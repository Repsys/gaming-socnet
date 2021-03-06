@extends('layouts.template')

@section('title', 'Форум - Создание новой темы')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                <form method="POST" action="{{route('forum-topic-create_post', ['domain' => $project->domain, 'sec_id' => $section->id])}}">
                    @csrf
                    @include('components.alerts')
                    @include('components.form.input-field', [
                        'label' => 'Заголовок',
                        'name' => 'title',
                        'required' => true
                    ])
                    @include('components.form.textarea-field', [
                        'label' => 'Описание',
                        'name' => 'text',
                        'required' => true,
                        'rows' => 10,
                        'max' => 2000
                    ])
                    <div class="mt-4">
                        <a href="{{route('forum-section', ['domain' => $project->domain, 'id' => $section->id])}}"
                           class="btn btn-secondary px-5 mr-2">Назад</a>
                        <button type="submit" class="btn btn-success px-5">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
