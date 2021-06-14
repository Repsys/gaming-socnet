@extends('layouts.template')

@section('title', $project->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card bg-transparent shadow blogpost-card h-100">
                    <div class="card-body p-0">
                        <div class="row flex-lg-row-reverse">
                            <div class="col-12 col-lg-7">
                                <img class="card-img projects-image"
                                     src="{{Storage::url('project/previews/'.$project->preview_image)}}"
                                     alt="{{$project->preview_image}}">
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
                    <div class="card-footer">
                        <nav class="navbar navbar-expand-sm navbar-dark d-flex justify-content-between">
                            <div id="navbarProject">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link {{$content == 'overview' ? 'active' : ''}}"
                                           href="{{route('project', ['domain' => $project->domain, 'content' => 'overview'])}}">Обзор</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{$content == 'forum' ? 'active' : ''}}"
                                           href="{{route('project', ['domain' => $project->domain, 'content' => 'forum'])}}">Форум</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="">
                                @include('components.author', ['account' => $project->account])
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @include('components.alerts')
                @switch($content)
                    @case('overview')
                        @include('projects.overview')
                        @break
                    @case('forum')
                        @include('forum.index')
                        @break
                    @default
                @endswitch
            </div>
        </div>
    </div>
@endsection
