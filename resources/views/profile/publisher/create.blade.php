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
                    @include('components.form.input-field', [
                        'label' => 'Название издательства',
                        'name' => 'name',
                        'required' => true
                    ])
                    @include('components.form.textarea-field', [
                        'label' => 'Об издательстве',
                        'name' => 'about',
                        'rows' => 5,
                        'max' => 2000
                    ])
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success px-5">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
