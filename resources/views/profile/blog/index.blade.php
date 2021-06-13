<div class="row">
    @forelse($posts as $post)
        <div class="col-12 col-xl-6 mb-4">
            <div class="card bg-transparent shadow blogpost-card h-100">
                <img class="card-img-top blog-image"
                     src="{{Storage::url('blog/previews/'.$post->image)}}"
                     alt="{{$post->image}}">
                <div class="card-body">
                    <h4 class="card-title">{{$post->title}}</h4>
                    <p class="card-text">
                        @include('components.output.output-text', [
                            'text' => $post->text,
                            'max' => 400,
                        ])
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <p class="card-text m-0"><small class="text-muted-light">{{$post->created_at}}</small></p>
                    <a href="{{route('blog-post', ['login' => $account->login, 'id' => $post->id])}}"
                       class="btn btn-outline-info">Читать дальше</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col">
            <p class="text-center">
                Нет ни одного поста :(
            </p>
        </div>
    @endforelse
</div>
