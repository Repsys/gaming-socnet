<div class="row">
    @forelse($posts as $post)
        <div class="col-12 col-xl-6">
            <div class="card bg-dark shadow blogpost-card mb-4 bg-transparent">
                <img class="card-img-top blog-image" src="https://i.redd.it/jwanbica21w41.jpg"
                     alt="Image">
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
