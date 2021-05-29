@extends('layouts.template')

@section('title', 'Профиль')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-end">
                <img
                    src="https://gif.cmtt.space/3/paper-media/c/cicada-3301/89c4afba146f34f98bd2.jpg"
                    class="avatar avatar-profile">
                <div class="ml-3">
                    <h3 class="card-title">{{$profile->name ?: $account->login}}</h3>
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
