@extends('layouts.template')

@section('title', 'Форум - '.$project->name.' - '.$topic->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-0">{{'Форум - '.$project->name}}</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark shadow blogpost-card mb-4 bg-transparent">
                    <div class="card-body">
                        <h4 class="card-title">{{$topic->name}}</h4>
                        <p class="card-text">{{$topic->about}}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text m-0"><small class="text-muted-light">{{$topic->created_at}}</small></p>
                        <p class="card-text m-0"><small class="text-muted-light">Автор - {{$topic->created_at}}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
