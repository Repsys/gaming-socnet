@extends('layouts.template')

@section('title', 'Вход')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                <form method="POST" action="{{route('login_post')}}">
                    @csrf
                    @include('components.alerts')
                    <div class="form-group">
                        <label for="inputLogin" class="required">Логин</label>
                        <input name="login" type="text"
                               class="form-control {{$errors->has('login') ? 'is-invalid' : ''}}"
                               id="inputLogin"
                               aria-describedby="loginHelp"
                               value="{{ old('login') }}">
                        <small id="loginHelp" class="form-text text-muted">Введите логин или email</small>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="required">Пароль</label>
                        <input name="password" type="password"
                               class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="inputPassword">
                    </div>
                    <div class="form-check">
                        <input name="check_me_out" type="checkbox"
                               class="form-check-input"
                               id="inputCheckMeOut">
                        <label class="form-check-label" for="inputCheckMeOut">Запомнить меня</label>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success px-5 mr-2">Войти</button>
                        <a href="{{route('register')}}" class="btn btn-primary px-5" role="button">Регистрация</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

