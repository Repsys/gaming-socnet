<div class="row">
    <div class="col-12 d-flex justify-content-between px-4">
        <h3>Форум</h3>
        @can('create-forum-topic', $project)
            <a class="btn btn-success mb-2 mb-lg-0 ml-lg-2"
               href="{{route('forum-topic-create', ['domain' => $project->domain])}}">Создать тему</a>
        @endcan
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="list-group shadow">
            @forelse($topics as $topic)
                <a href="{{route('forum-topic', ['domain' => $project->domain, 'id' => $topic->id])}}" class="list-group-item text-light list-group-item-action  bg-transparent flex-column align-items-start">
                    <h5>{{$topic->name}}</h5>
                    <p>{{$topic->about}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted-light">{{$topic->created_at}}</small>
                        <small class="text-muted-light">Автор - {{$topic->created_at}}</small>
                    </div>
                </a>
            @empty
                <p class="text-center">
                    Нет ни одной темы :(
                </p>
            @endforelse
        </div>
    </div>
</div>
