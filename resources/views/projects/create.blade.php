@extends('layouts.template')

@section('title', 'Создание нового проекта')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                <form method="POST" action="{{route('projects-create_post')}}">
                    @csrf
                    @include('components.alerts')
                    @include('components.form.input-field', [
                        'label' => 'Название',
                        'name' => 'name',
                        'required' => true
                    ])
                    @include('components.form.input-field', [
                        'label' => 'Домен',
                        'name' => 'domain',
                        'required' => true,
                        'help' => 'Будет отображаться в URL'
                    ])
                    @include('components.form.textarea-field', [
                        'label' => 'О проекте',
                        'name' => 'about',
                        'rows' => 5
                    ])
                    @include('components.form.checkbox-field', [
                       'label' => 'Закрытый проект ?',
                       'name' => 'is_closed',
                       'help' => 'Если проект закрытый, то только определенный круг лиц сможет просматривать проект'
                   ])
                    <div class="mt-4">
                        <a href="{{route('profile', ['login' => $account->login, 'content' => 'projects'])}}"
                           class="btn btn-secondary px-5 mr-2">Назад</a>
                        <button type="submit" class="btn btn-success px-5">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
