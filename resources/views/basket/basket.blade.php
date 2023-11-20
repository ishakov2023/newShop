@extends('layouts.base')
@section('title','Корзина')


@section('content')
    <section>
        <div class="container">
            @if(count($products))

            @foreach($products as $product)
                <h4>

                    {{$product->name}}

                </h4>

                <p>

                    {{$product->description}}

                </p>

                <p class="small text-muted">
                    Цена : {{$product->price}}
                </p>
                <form action="{{route('basket.update',$product->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <p class="small text-muted">
                        Цена : {{$product->count}}
                    </p>
                    <input type="hidden" value="{{$product->amount}}" name="amount">
                    <input type="hidden" value="{{$product->count}}" name="count">
                   <input type="submit" value="-" name="minus">
                    <input type="submit" value="+" name="plus">

                </form>
                <form action="{{route('basket.delete',$product->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Удалить" name="delete">
                </form>

            @endforeach
                @else
                <h4>

                    Ваша корзина пуста

                </h4>
               @endif
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
