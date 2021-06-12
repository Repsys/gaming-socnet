<div class="row">
    <div class="col-12 d-flex justify-content-between px-4">
        <h3>Обзор</h3>
        @can('create-forum-section', $project)
            <a class="btn btn-primary mb-2 mb-lg-0 ml-lg-2" href="{{route('projects-create')}}">Редактировать</a>
        @endcan
    </div>
</div>
<hr>
<div class="row">
    <p>
        {{$project->overview}}
    </p>
</div>

