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
                <a href="{{route('forum-section', ['domain' => $project->domain, 'id' => $section->id])}}"
                   class="list-group-item text-light list-group-item-action  bg-transparent flex-column align-items-start">
                    <h5>{{$section->title}}</h5>
                    <p>{{$section->about}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted-light">{{$section->created_at}}</small>
                        <small class="text-muted-light text-right">Автор - {{$section->created_at}}</small>
                    </div>
                </a>
            @endforeach
        </div>
        @if($sections->isEmpty())
            <p class="text-center">
                Нет ни одного раздела :(
            </p>
        @endif
    </div>
</div>
