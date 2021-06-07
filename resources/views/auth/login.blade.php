@extends('layouts.template')

@section('title', 'Вход')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                <form method="POST" action="{{route('login_post')}}">
                    @csrf
                    @include('components.alerts')
                    @include('components.form.input-field', [
                        'label' => 'Логин',
                        'name' => 'login',
                        'required' => true,
                        'help' => 'Введите логин или email'
                    ])
                    @include('components.form.input-field', [
                        'label' => 'Пароль',
                        'name' => 'password',
                        'type' => 'password',
                        'required' => true
                    ])
                    @include('components.form.checkbox-field', [
                       'label' => 'Запомнить меня',
                       'name' => 'check_me_out'
                   ])
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success px-5 mr-2">Войти</button>
                        <a href="{{route('register')}}" class="btn btn-primary px-5" role="button">Регистрация</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

