@extends('layouts.base')
@section('title',$catalog->name)


@section('content')
    <section>
        <div class="container">


            <h1>

                {{$catalog->name}}

            </h1>

            <p>

                {{$catalog->description}}

            </p>

            <p class="small text-muted">
                Цена : {{$catalog->price}}
            </p>

            <p class="small text-muted">
                Количество : {{$catalog->amount}}
            </p>

            <a href="{{route('user.catalog')}}">

                Назад

            </a>
        </div>

    </section>
@endsection
