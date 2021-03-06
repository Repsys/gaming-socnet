<header id="header" class="shadow">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5 py-3">
        <a class="navbar-brand" href="{{route('main')}}">{{env('APP_NAME')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('main')}}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('projects')}}">Проекты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('publishers')}}">Издатели</a>
                </li>
            </ul>
            <form class="form-inline mr-5">
                <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
            </form>
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="auth-link nav-link" href="{{route('login')}}">Вход</a>
                    </li>
                @endguest
                @auth
                    <div class="d-flex align-items-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->login}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('profile')}}">Профиль</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{route('logout')}}">Выход</a>
                            </div>
                        </li>
                        <a href="{{route('profile', ['login' => Auth::user()->login])}}">
                            <img src="{{Storage::url('avatars/'.Auth::user()->avatar)}}"
                                 class="avatar-small ml-2">
                        </a>
                    </div>
                @endauth
            </ul>
        </div>
    </nav>
</header>
