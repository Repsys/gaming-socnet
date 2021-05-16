@extends('layouts.template')

@section('title', 'Профиль')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                <p>Сперва заполните, пожалуйста, ваш профиль:</p>
                <form method="POST" action="{{route('profile-create_post')}}">
                    @csrf
                    @include('components.alerts')
                    <div class="form-group">
                        <label for="inputName" class="required">Название</label>
                        <input name="name" type="text"
                               class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                               id="inputName"
                               value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputAbout">Об издательстве</label>
                        <textarea name="about" maxlength="2000"
                                  class="form-control {{$errors->has('about') ? 'is-invalid' : ''}}"
                                  id="inputAbout" rows="5">{{ old('about') ?? '' }}</textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success px-5">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
