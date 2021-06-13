<div class="d-flex align-items-center">
    <small class="text-muted-light text-right">
        Автор - {{$account->getFullName()}}
    </small>
    <a href="{{route('profile', ['login' => $account->login])}}">
        <img src="{{Storage::url('avatars/'.$account->avatar)}}"
             class="avatar-small ml-2">
    </a>
</div>
