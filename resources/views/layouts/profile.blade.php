@extends('layouts.template')

@section('title', 'Профиль '.$account->login)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-auto pr-0">
                <img
                    src="https://gif.cmtt.space/3/paper-media/c/cicada-3301/89c4afba146f34f98bd2.jpg"
                    class="avatar avatar-profile">
            </div>
            <div class="col-auto pl-0 align-self-end">
                <h3 class="card-title ml-3 mb-2">{{$profile->name ?: $account->login}}</h3>
            </div>
            <div class="col align-self-end">
                @if($isOwner)
                    <a class="btn btn-primary mb-2 float-right" href="{{route('profile-edit')}}">Редактировать</a>
                @endif
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
