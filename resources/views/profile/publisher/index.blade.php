@extends('layouts.profile')

@section('profile-nav')
    <li class="nav-item">
        <a class="nav-link" href="{{route('profile', ['login' => $account->login])}}">Блог</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('projects', ['login' => $account->login])}}">Проекты</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Об издателе</a>
    </li>
@endsection

@section('profile-content')
    @include('components.output.output-field', [
            'label' => 'Название',
            'value' => $profile->name ?? ''
        ])
    @include('components.output.output-field', [
            'label' => 'Об издательстве',
            'value' => $profile->about ?? ''
        ])
@endsection
