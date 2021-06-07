@extends('layouts.template')

@section('title', $project->name)

@section('content')
    <div class="container">
        <div class="col-12 mb-4">
            <div class="card bg-transparent shadow blogpost-card h-100">
                <div class="card-body p-0">
                    <div class="row flex-lg-row-reverse">
                        <div class="col-12 col-lg-7">
                            <img class="card-img projects-image" src="https://cdn.akamai.steamstatic.com/steam/apps/1450830/header.jpg?t=1621623807"
                                 alt="Image">
                        </div>
                        <div class="col-12 col-lg-5 px-5 pr-lg-3 py-4 d-flex flex-column">
                            <h4 class="card-title">{{$project->name}}</h4>
                            <p class="card-text">
                                @include('components.output.output-text', [
                                    'text' => $project->about,
                                    'max' => 400,
                                ])
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
