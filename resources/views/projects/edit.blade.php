@extends('layouts.template')

@section('title', 'Создание нового проекта')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <h1 class="mb-3 text-center">@yield('title')</h1>
                <hr>
                <form method="POST" action="{{route('projects-edit_post', ['domain' => $project->domain])}}" enctype="multipart/form-data">
                    @csrf
                    @include('components.alerts')
                    @include('components.form.input-field', [
                        'label' => 'Название',
                        'name' => 'name',
                        'required' => true,
                        'value' => $project->name ?? '',
                    ])
                    @include('components.form.input-field', [
                        'label' => 'Домен',
                        'name' => 'domain',
                        'required' => true,
                        'help' => 'Будет отображаться в URL',
                        'value' => $project->domain ?? '',
                    ])
                    @include('components.form.textarea-field', [
                        'label' => 'О проекте',
                        'name' => 'about',
                        'required' => true,
                        'rows' => 5,
                        'max' => 400,
                        'value' => $project->about ?? '',
                        'help' => 'Будет отображаться в карточке проекта'
                    ])
                    @include('components.form.input-file-field', [
                        'label' => 'Превью',
                        'name' => 'preview_image',
                        'accept' => 'image/*',
                    ])
                    @include('components.form.checkbox-field', [
                       'label' => 'Закрытый проект ?',
                       'name' => 'is_closed',
                       'value' => $project->is_closed ?? false,
                       'help' => 'Если проект закрытый, то только определенный круг лиц сможет просматривать проект'
                   ])
                    @include('components.form.textarea-field', [
                        'label' => 'Обзор',
                        'name' => 'overview',
                        'rows' => 10,
                        'max' => 5000,
                        'value' => $project->overview ?? '',
                    ])
                    <div class="mt-4">
                        <a href="{{route('project', ['domain' => $project->domain])}}"
                           class="btn btn-secondary px-5 mr-2">Назад</a>
                        <button type="submit" class="btn btn-success px-5">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
