@extends('layouts.template')

@section('title', 'Профиль '.$account->login)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-auto pr-0 align-self-end">
                <img
                    src="https://image.flaticon.com/icons/png/512/168/168724.png"
                    class="avatar avatar-profile">
            </div>
            <div class="col-auto pl-0 align-self-end">
                <h3 class="card-title ml-3 mb-2">{{$fullName}}</h3>
            </div>
            <div class="col-auto align-self-end ml-auto mb-2">
                <div class="d-flex flex-column flex-lg-row">
                    @yield('profile-buttons')
                    @if($isOwner)
                        @if($content == 'blog')
                            <a class="btn btn-info mb-2 mb-lg-0 ml-lg-2" href="{{route('blog-create')}}">Добавить пост</a>
                        @endif
                        <a class="btn btn-primary mb-2 mb-lg-0 ml-lg-2" href="{{route('profile-edit')}}">Редактировать</a>
                    @endif
                </div>
            </div>
        </div>
        <hr class="m-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-sm navbar-dark">
                    <div id="navbarProfile">
                        <ul class="navbar-nav">
                            @yield('profile-nav')
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row">
            <div class="col-12">
                @include('components.alerts')
                @yield('profile-content')
            </div>
        </div>
    </div>
@endsection
