@extends('layouts.base')
@section('title',$product->name)


@section('content')
    <section>
        <div class="container">


            <h1>

                {{$product->name}}

            </h1>

            <p>

                {{$product->description}}

            </p>

            <p class="small text-muted">
                Цена : {{$product->price}}
            </p>

            <p class="small text-muted">
                Количество : {{$product->amount}}
            </p>
            <div class="col-12 col-md-4">
                @if($product->amount !== 0 )
                <form action="{{route('basket.create')}}" >
                    <input type="hidden" value="{{$product->id}}" name="id">
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
