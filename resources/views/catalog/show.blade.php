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
            <div class="col-12 col-md-4">
                @if($catalog->amount !== 0 )
                <form action="{{route('basket.create')}}" >
                    <input type="hidden" value="{{$catalog->id}}" name="id">
                    <button type="submit" name="add" class="btn btn-primary">{{__('Добавить')}}</button>
                </form>
                @else
                    <form action="" >
                        <button type="submit"  disabled>Нет в наличии </button>
                    </form>
                @endif
                <br>
                <form action="{{route('basket')}}" >
                    <button type="submit" name="add" class="btn btn-primary">{{__('Корзина')}}</button>
                </form>
            </div>


            <div>
                <br>
                <br>
            <a href="{{route('user.catalog')}}">

                Назад

            </a>
            </div>
        </div>

    </section>
@endsection
