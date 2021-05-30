@extends('layouts.profile')

@section('profile-nav')
    <li class="nav-item">
        <a class="nav-link {{$content == 'blog' ? 'active' : ''}}"
           href="{{route('profile', ['login' => $account->login, 'content' => 'blog'])}}">Блог</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$content == 'projects' ? 'active' : ''}}"
           href="{{route('profile', ['login' => $account->login, 'content' => 'projects'])}}">Проекты</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$content == 'about' ? 'active' : ''}}"
           href="{{route('profile', ['login' => $account->login, 'content' => 'about'])}}">Об издателе</a>
    </li>
@endsection

@section('profile-content')
    @switch($content)
        @case('blog')
            @include('profile.blog.index')
            @break
        @case('projects')
            @include('profile.publisher.projects')
            @break
        @case('about')
            @include('profile.publisher.about')
            @break
        @default
    @endswitch
@endsection
