@extends('layouts.base')
@section('title',$catalogs->title)


@section('content')
    <section>
        <div class="container">


            <h1>

                {{$catalogs->title}}

            </h1>

            <p>

                {{$catalogs->content}}

            </p>

            <p class="small text-muted">
                Цена : {{$catalogs->price}}
            </p>

            <p class="small text-muted">
                Количество : {{$catalogs->count}}
            </p>

            <a href="{{route('user.catalog')}}">

                Назад

            </a>
        </div>

    </section>
@endsection
