@extends('layouts.template')

@section('title', 'Издательства')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                <div class="row">
                    @foreach($publishers as $publisher)
                        <div class="col-12 col-md-6 mb-4">
                            <div class="card bg-dark shadow publisher-card">
                                <div class="card-header p-0 d-flex align-items-end">
                                    <img
                                        src="https://gif.cmtt.space/3/paper-media/c/cicada-3301/89c4afba146f34f98bd2.jpg"
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
