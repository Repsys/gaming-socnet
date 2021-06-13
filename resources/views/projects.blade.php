@extends('layouts.template')

@section('title', 'Проекты')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-0">@yield('title')</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                @include('projects.index')
            </div>
        </div>
    </div>
@endsection
