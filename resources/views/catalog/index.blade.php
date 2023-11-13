@extends('layouts.base')
@section('title','Пост')


@section('content')
    <section>
        <div class="container">

            <h1 class="mb-5">
                {{__('Список товаров')}}
            </h1>
            <nav class="navbar navbar-expand-md bg-body-tertiary">
                <div class="container">
                    {{--        <a href="{{route('home')}}" class="navbar-brand" >--}}
                    {{--            {{"Гавносайт"}}--}}
                    {{--        </a>--}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <form>
                        @csrf
                        <div class="col-12 ">
                            <div class="mb-3">
                                <select name="category_id" class="form-control" value="{{request('category_id')}} ">
                                    <option value="">
                                        Все товары
                                    </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{--                        <ul class="navbar-nav">--}}

                            {{--                            <li class="nav-item">--}}

                            {{--                                <a href="" class="nav-link " aria-current="page" >--}}
                            {{--                                    {{__('Компьютеры')}}--}}
                            {{--                                </a>--}}

                            {{--                            </li>--}}

                            {{--                            <li class="nav-item">--}}

                            {{--                                <a href="" class="nav-link" aria-current="page" >--}}
                            {{--                                    {{__('Ноутбуки')}}--}}
                            {{--                                </a>--}}

                            {{--                            </li>--}}

                            {{--                        </ul>--}}


                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">{{__('Применить')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>

            @if(empty($catalog))

                {{__('Нет постов')}}

            @else
                <div class="row">
                    @foreach($catalog as $catalogs)

                        {{--                        @dd($catalogs)--}}
                        <div class="col-12 col-md-4">
                            <div class="mb-4 card">
                                <div class="card-body">
                                    <h5>
                                        <a href="{{route('user.catalog.show',$catalogs->id)}}">
                                            {{$catalogs->name}}
                                        </a>
                                    </h5>
                                    <p class="small text-muted">
                                        Цена : {{$catalogs->price}}
                                    </p>
                                    <p class="small text-muted">
                                        Количество : {{$catalogs->amount}}
                                    </p>
                                    <p class="small text-muted">
                                        {{now()->format('d.m.Y')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif


        </div>
        <div class="col-12 col-md-4">
            <div class="mb-4 card">
                <div class="card-body">
                    <form method="POST" action="{{route('login.logout')}}">
                        @csrf
                        <input type="submit" value="Выход">
                    </form>
{{--                                            <h3>--}}
{{--                                                <a href="{{route('login.logout')}}">--}}
{{--                                                    Выход--}}
{{--                                                </a>--}}
{{--                                            </h3>--}}
                </div>
            </div>
            @if($user->admin)
                rererereree
            @endif
        </div>
    </section>
@endsection
