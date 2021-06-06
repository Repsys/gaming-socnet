@extends('layouts.profile')

{{--@section('profile-buttons')--}}
{{--    --}}
{{--@endsection--}}

@section('profile-nav')
    <li class="nav-item">
        <a class="nav-link {{$content == 'blog' ? 'active' : ''}}"
           href="{{route('profile', ['login' => $account->login, 'content' => 'blog'])}}">Блог</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$content == 'about' ? 'active' : ''}}"
           href="{{route('profile', ['login' => $account->login, 'content' => 'about'])}}">О пользователе</a>
    </li>
@endsection

@section('profile-content')
    @switch($content)
        @case('blog')
            @include('profile.blog.index')
            @break
        @case('about')
            @include('profile.user.about')
            @break
        @default
    @endswitch
@endsection

