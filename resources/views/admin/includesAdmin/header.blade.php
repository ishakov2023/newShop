<nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container">
{{--        <a href="{{route('home')}}" class="navbar-brand" >--}}
{{--            {{"Гавносайт"}}--}}
{{--        </a>--}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse">

            <ul class="navbar-nav me-auto mb-2 mb-md-0">

                <li class="nav-item">

                    <a href="{{route('home')}}" class="nav-link {{Route::is('home') ? 'active' : ''}}" aria-current="page" >
                        {{__('Главная')}}
                    </a>

                </li>


            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">


                <li class="nav-item">

                    <a href="{{route('login')}}" class="nav-link " aria-current="page" >
                        {{__('Вход')}}
                    </a>

                </li>

                @if(!is_null($user) && $user->admin)
                <li class="nav-item">

                    <a href="{{route('admin.index')}}" class="nav-link  " aria-current="page" >
                        {{__('Продукты')}}
                    </a>

                </li>
                <li class="nav-item">

                    <a href="{{route('category')}}" class="nav-link " aria-current="page" >
                        {{__('Категории')}}
                    </a>

                </li>
                @endif

            </ul>

        </div>
    </div>
</nav>
