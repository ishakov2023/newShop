@extends('layouts.base')
@section('title',' Страница входа')


@section('content')

    <section>

        @component('components.container')

            <div class="row">

                <div class="col-12 col-md-6 offset-md-3">

                    @component('components.card')

                        @component('components.card-header')

                            @component('components.card-title')
                                {{__('Вход')}}
                            @endcomponent

                        @endcomponent

                        @component('components.card-body')
                            <form action="{{route('login.store')}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @component('components.form-item')

                                    @component('components.label')
                                        {{__('Email')}}
                                    @endcomponent

                                    <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                           autofocus>

                                @endcomponent

                                @component('components.form-item')

                                    @component('components.label')
                                        {{__('Пароль')}}
                                    @endcomponent

                                    <input type="password" name="password" value="{{old('password')}}"
                                           class="form-control">
                                        @error('password')
                                        <div class="small text-danger ">
                                            {{$message}}
                                        </div>
                                        @enderror

                                @endcomponent
                                @component('components.form-item')
                                    <div class="form-check">
                                        <input type="checkbox" value="1" name="remember" class="form-check-input"
                                               id="remember">

                                        <label class="form-check-label" for="remember">
                                            {{__('Запомнить')}}
                                        </label>
                                    </div>
                                @endcomponent

                                <button type="submit" class="btn btn-primary">{{__('Вход')}}</button>

                            </form>

                        @endcomponent

                    @endcomponent

                </div>

            </div>

        @endcomponent

    </section>

@endsection


