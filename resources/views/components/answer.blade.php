<li class="list-group-item text-light bg-transparent p-0">
    <div class="row">
        <div class="d-flex flex-column flex-sm-row w-100 h-100">
            <div class="col-auto">
                <div
                    class="forum-answer-profile d-flex flex-sm-column align-items-center h-100 p-3">
                    <a href="{{route('profile', ['login' => $account->login])}}">
                        <img src="{{Storage::url('avatars/'.$account->avatar)}}"
                             class="forum-answer-profile-avatar avatar mb-sm-2"
                             alt="{{$account->avatar}}">
                    </a>
                    <small class="ml-2 ml-sm-0 text-sm-center" style="max-width: 100px">
                        {{$account->getFullName()}}
                    </small>
                </div>
            </div>
            <div class="col pl-sm-0">
                <div class="d-flex flex-column justify-content-between h-100 p-3">
                    <pre>{{$text}}</pre>
                    <small
                        class="text-muted-light align-self-end">{{$created_at}}</small>
                </div>
            </div>
        </div>
    </div>
</li>
