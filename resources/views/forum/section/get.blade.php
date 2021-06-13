@extends('layouts.template')
@php
    $title = $project->name.' - Форум';
@endphp

@section('title', $title)

@include('components.back-btn',[
    'url' => route('project', ['domain' => $project->domain, 'content' => 'forum'])
])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-0">{{$title}}</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark shadow blogpost-card mb-4 bg-transparent">
                    <div class="card-body">
                        <h4 class="card-title">{{$section->title}}</h4>
                        <pre class="card-text">{{$section->about}}</pre>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text m-0"><small class="text-muted-light">{{$section->created_at}}</small></p>
                        <p class="card-text m-0 text-right"><small class="text-muted-light ">Автор
                                - {{$section->account->getFullName()}}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-between px-4">
                <h3>{{$section->title}}</h3>
                @can('create-forum-topic', $section)
                    <a class="btn btn-success mb-2 mb-lg-0 ml-lg-2"
                       href="{{route('forum-topic-create', ['domain' => $project->domain, 'sec_id' => $section->id])}}">Создать тему</a>
                @endcan
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                @if(isset($section->topics) and !$section->topics->isEmpty())
                    <div class="list-group shadow">
                        @foreach($section->topics as $topic)
                            <div class="list-group-item text-light bg-transparent flex-column align-items-start">
                                <a href="{{route('forum-topic', ['domain' => $project->domain, 'sec_id' => $section->id, 'id' => $topic->id])}}"
                                   class="list-group-item-action text-light">
                                    <h5>{{$topic->title}}</h5>
                                </a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted-light">{{$topic->created_at}}</small>
                                    @include('components.avatar-small', ['account' => $topic->account])
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">
                        Нет ни одной темы :(
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
