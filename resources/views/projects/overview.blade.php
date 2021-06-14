<div class="row">
    <div class="col-12 d-flex justify-content-between px-4">
        <h3>Обзор</h3>
        @can('create-forum-section', $project)
            <a class="btn btn-primary mb-2 mb-lg-0 ml-lg-2"
               href="{{route('projects-edit', ['domain' => $project->domain])}}">Редактировать</a>
        @endcan
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <pre>
            @include('components.output.output-text', [
                'text' => $project->overview,
                'emptyText' => ''
            ])
        </pre>
    </div>
</div>

