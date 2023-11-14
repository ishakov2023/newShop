@extends('layouts.base')
@section('title','ADMIN')


@section('content')

    <section>

        @component('components.container')

            <div class="col-12 col-md-4">
                <div class="mb-4 card">
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.logout')}}">
                            @csrf
                            <input type="submit" name ="logout" value="Выход">
                        </form>
                        {{--                                            <h3>--}}
                        {{--                                                <a href="{{route('login.logout')}}">--}}
                        {{--                                                    Выход--}}
                        {{--                                                </a>--}}
                        {{--                                            </h3>--}}
                    </div>
                </div>
            </div>
        @endcomponent

    </section>

@endsection
