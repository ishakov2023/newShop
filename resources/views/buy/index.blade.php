@extends('layouts.base')
@section('title','Корзина')


@section('content')
    <section>
        <div class="container">
            <h4>
                Покупка успешно оформленна
            </h4>

            <div>
                <br>
                <br>
                <a href="{{route('user.catalog')}}">

                    Вернуться в каталог

                </a>
            </div>
        </div>
    </section>
@endsection
