<div class="row">
    <div class="col-12 d-flex justify-content-between px-4">
        <h3>Форум</h3>
        @can('create-forum-section', $project)
            <a class="btn btn-success mb-2 mb-lg-0 ml-lg-2"
               href="{{route('forum-section-create', ['domain' => $project->domain])}}">Создать раздел</a>
        @endcan
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="list-group shadow">
            @foreach($sections as $section)
                <div class="list-group-item text-light bg-transparent flex-column align-items-start">
                    <a href="{{route('forum-section', ['domain' => $project->domain, 'id' => $section->id])}}"
                       class="list-group-item-action text-light">
                        <h5>{{$section->title}}</h5>
                        <p>
                            @include('components.output.output-text', [
                                'text' => $section->about,
                            ])
                        </p>
                    </a>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted-light">{{$section->created_at}}</small>
                        @include('components.author', ['account' => $section->account])
                    </div>
                </div>
            @endforeach
        </div>
        @if($sections->isEmpty())
            <p class="text-center">
                Нет ни одного раздела :(
            </p>
        @endif
    </div>
</div>
