@extends('layouts.profile')

@section('profile-nav')
    <li class="nav-item">
        <a class="nav-link" href="{{route('profile')}}">Блог</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Подписки</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">О пользователе</a>
    </li>
@endsection

@section('profile-content')
    @include('components.output.output-field', [
                        'label' => 'Имя',
                        'value' => $profile->name ?? ''
                    ])
    @include('components.output.output-field', [
            'label' => 'Фамилия',
            'value' => $profile->surname ?? ''
        ])
    @include('components.output.output-field', [
            'label' => 'Обо мне',
            'value' => $profile->about ?? ''
        ])
@endsection

