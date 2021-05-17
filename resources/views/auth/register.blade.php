@extends('layouts.template')

@section('title', 'Регистрация')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                <form method="POST" action="{{route('register_post')}}">
                    @csrf
                    @include('components.alerts')
                    @include('components.form.input-field', [
                        'label' => 'Логин',
                        'name' => 'login',
                        'required' => true,
                        'help' => 'Будет отображаться в URL'
                    ])
                    @include('components.form.input-field', [
                        'label' => 'Email',
                        'name' => 'email',
                        'required' => true
                    ])
                    @include('components.form.input-field', [
                        'label' => 'Пароль',
                        'name' => 'password',
                        'type' => 'password',
                        'required' => true
                    ])
                    @include('components.form.input-field', [
                        'label' => 'Подтвердите пароль',
                        'name' => 'password_confirmation',
                        'type' => 'password',
                        'required' => true
                    ])
                    @include('components.form.checkbox-field', [
                       'label' => 'Аккаунт Издателя',
                       'name' => 'is_publisher'
                   ])
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success px-5">Создать аккаунт</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
