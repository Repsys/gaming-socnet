@extends('layouts.template')
@php
    $title = $project->name.' - Форум';
@endphp

@section('title', $title)

@include('components.back-btn',[
    'url' => route('forum-section', ['domain' => $project->domain, 'id' => $section->id])
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
                        <h4 class="card-title">{{$topic->title}}</h4>
                        <pre class="card-text">{{$topic->text}}</pre>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text m-0"><small class="text-muted-light">{{$topic->created_at}}</small></p>
                        @include('components.avatar-small', ['account' => $topic->account])
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                @if(isset($topic->answers) and !$topic->answers->isEmpty())
                    <ul class="list-group shadow">
                        @foreach($topic->answers as $answer)
                            <li class="list-group-item text-light bg-transparent p-0">
                                <div class="row">
                                    <div class="d-flex flex-column flex-sm-row w-100 h-100">
                                        <div class="col-auto">
                                            <div
                                                class="forum-answer-profile d-flex flex-sm-column align-items-center h-100 p-3">
                                                <a href="{{route('profile', ['login' => $answer->account->login])}}">
                                                    <img src="{{Storage::url('avatars/'.$answer->account->avatar)}}"
                                                         class="forum-answer-profile-avatar avatar mb-sm-2"
                                                         alt="{{$answer->account->avatar}}">
                                                </a>
                                                <small class="ml-2 ml-sm-0 text-sm-center" style="max-width: 100px">
                                                    {{$answer->account->getFullName()}}
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col pl-sm-0">
                                            <div class="d-flex flex-column justify-content-between h-100 p-3">
                                                <pre>{{$answer->text}}</pre>
                                                <small
                                                    class="text-muted-light align-self-end">{{$answer->created_at}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">
                        Нет ни одного ответа :(
                    </p>
                @endif
            </div>
        </div>
        @can('create-forum-answer', $topic)
            <div class="row mt-5">
                <div class="col-12 mx-auto">
                    <form method="POST" action="{{route('forum-answer-create_post', [
                        'domain' => $project->domain,
                        'sec_id' => $section->id,
                        'id' => $topic->id
                    ])}}">
                        @csrf
                        @include('components.form.textarea-field', [
                            'label' => 'Добавить ответ',
                            'name' => 'text',
                            'htmlRequired' => true,
                            'rows' => 10,
                            'max' => 2000
                        ])
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success px-5">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan
    </div>
@endsection
