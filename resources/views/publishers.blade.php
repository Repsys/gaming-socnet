@extends('layouts.template')

@section('title', 'Издатели')

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
                <div class="row">
                    @foreach($publishers as $publisher)
                        <div class="col-12 col-md-6 mb-4">
                            <div class="card bg-transparent shadow publisher-card h-100">
                                <div class="card-header p-0 d-flex align-items-end">
                                    <img
                                        src="{{Storage::url('avatars/'.$publisher->account->avatar)}}"
                                        class="avatar">
                                    <div class="ml-3">
                                        <a href="{{route('profile', ['login' => $publisher->account->login])}}" class="card-link">
                                            <h3 class="card-title">{{$publisher->name}}</h3>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        @include('components.output.output-text', [
                                            'text' => $publisher->about,
                                            'max' => 400,
                                        ])
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
