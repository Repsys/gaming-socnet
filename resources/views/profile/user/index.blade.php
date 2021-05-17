@extends('layouts.template')

@section('title', 'Профиль')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                @include('components.alerts')
                @include('components.output.output-field', [
                        'label' => 'Имя',
                        'value' => $profile->name
                    ])
                @include('components.output.output-field', [
                        'label' => 'Фамилия',
                        'value' => $profile->surname
                    ])
                @include('components.output.output-field', [
                        'label' => 'Обо мне',
                        'value' => $profile->about
                    ])
            </div>
        </div>
    </div>
@endsection
