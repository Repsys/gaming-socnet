@extends('layouts.template')

@section('title', 'Профиль')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                @include('components.alerts')
                <h5>Название:</h5>
                <p>{{$profile->name}}</p>

                <h5>Об издательстве:</h5>
                <p>{{$profile->about ?: 'Не указано'}}</p>
            </div>
        </div>
    </div>
@endsection
