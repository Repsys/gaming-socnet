@extends('layouts.template')

@section('title', 'Профиль')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 mx-auto">
                <h1 class="mb-3 text-center">Профиль пользователя {{$account->login}}</h1>
                <hr>
                <form method="POST" action="{{route('profile-edit_post')}}" enctype="multipart/form-data">
                    @csrf
                    @include('components.alerts')
                    @include('profile.edit')
                    @include('components.form.input-field', [
                        'label' => 'Имя',
                        'name' => 'name',
                        'value' => $profile->name ?? ''
                    ])
                    @include('components.form.input-field', [
                        'label' => 'Фамилия',
                        'name' => 'surname',
                        'value' => $profile->surname ?? ''
                    ])
                    @include('components.form.textarea-field', [
                        'label' => 'Обо мне',
                        'name' => 'about',
                        'value' => $profile->about ?? '',
                        'rows' => 5,
                        'max' => 2000
                    ])
                    <div class="mt-4">
                        <a href="{{route('profile')}}" class="btn btn-secondary px-5 mr-2">Назад</a>
                        <button type="submit" class="btn btn-success px-5">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
