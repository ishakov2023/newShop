@extends('layouts.base')
@section('title','Корзина')


@section('content')
    <section>
        <div class="container">

            @php
                $sum = 0;
            @endphp
            @if(count($products))
                @foreach($products as $product)

                    <h4>

                        Товара {{$product->name}}

                    </h4>

                    <p>

                       Осталось в наличии : {{$product->amount}}

                    </p>

                    <p class="small text-muted">
                        Цена : {{$product->price}}
                    </p>

                    @php
                        $sum += $product->count * $product->price;
                    @endphp
                @endforeach

                <br>
                <h4>
                    Ваша сумма заказа:{{$sum}}
                </h4>
                <br>
                <form action="{{route('buy.update',$product->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Оформить" name="buy">
                </form>
                    <form action="{{route('buy.delete',$product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Отказаться" name="refuse">
                    </form>
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
