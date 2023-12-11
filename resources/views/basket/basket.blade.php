@extends('layouts.base')
@section('title','Корзина')


@section('content')
    <section>
        <div class="container">

            @php
                $sum = 0;
            @endphp
            @if(count($baskets))
                @foreach($baskets as $basket)
                    @if(is_null($basket->pivot->deleted_at))
                    <h4>

                        {{$basket->name}}

                    </h4>

                    <p>

                        {{$basket->description}}

                    </p>

                    <p class="small text-muted">
                        Цена : {{$basket->price}}
                    </p>
                    <form action="{{route('basket.update',$basket->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <p class="small text-muted">
                            Цена : {{$basket->pivot->count}}
                        </p>
                        <input type="hidden" value="{{$basket->amount}}" name="amount">
                        <input type="hidden" value="{{$basket->pivot->basket_id}}" name="basketId">
                        <input type="hidden" value="{{$basket->pivot->count}}" name="count">
                        <input type="submit" value="-" name="minus">
                        <input type="submit" value="+" name="plus">

                    </form>
                    <form action="{{route('basket.delete',$basket->id)}}" method="POST">
                        <input type="hidden" value="{{$basket->pivot->basket_id}}" name="basketId">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Удалить" name="delete">
                    </form>

                    @php
                        $sum += $basket->pivot->count * $basket->price;
                    @endphp
                    @endif
                @endforeach

                <br>
                <h4>
                    Ваша сумма заказа:{{$sum}}
                </h4>
                <br>
                <form action="{{route('buy')}}" method="get">
                    @csrf
                    <input type="submit" value="Купить" name="buy">
                </form>
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
