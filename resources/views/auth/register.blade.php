@extends('layouts.template')

@section('title', 'Регистрация')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-8 mx-auto">
                <h1 class="mb-3 text-center">Регистрация</h1>
                <hr>
                <form method="POST" action="{{route('register_post')}}">
                    @csrf
                    @include('components.alerts')
                    <div class="form-group">
                        <label for="inputLogin" class="required">Логин</label>
                        <input name="login" type="text"
                               class="form-control {{$errors->has('login') ? 'is-invalid' : ''}}"
                               id="inputLogin" aria-describedby="loginHelp"
                               value="{{ old('login') }}">
                        <small id="loginHelp" class="form-text text-muted">Будет отображаться в URL</small>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="required">Email</label>
                        <input name="email" type="text"
                               class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                               id="inputEmail" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="required">Пароль</label>
                        <input name="password" type="password"
                               class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                               id="inputPassword">
                    </div>
                    <div class="form-group">
                        <label for="inputConfirmPassword" class="required">Подтвердите пароль</label>
                        <input name="confirm_password" type="password"
                               class="form-control {{$errors->has('confirm_password') ? 'is-invalid' : ''}}"
                               id="inputConfirmPassword">
                    </div>
                    <div class="form-check">
                        <input name="is_publisher" type="checkbox"
                               class="form-check-input"
                               id="inputIsPublisher" {{ old('is_publisher') ? 'checked="checked"' : '' }}>
                        <label class="form-check-label" for="inputIsPublisher">Аккаунт Издателя</label>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success px-5">Создать аккаунт</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
