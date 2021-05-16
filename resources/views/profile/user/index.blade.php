@extends('layouts.template')

@section('title', 'Профиль')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                @include('components.alerts')
                <h5>Имя:</h5>
                <p>{{$profile->name ?: 'Не указано'}}</p>

                <h5>Фамилия:</h5>
                <p>{{$profile->surname ?: 'Не указано'}}</p>

                <h5>Обо мне</h5>
                <p>{{$profile->about ?: 'Не указано'}}</p>
            </div>
        </div>
    </div>
@endsection
