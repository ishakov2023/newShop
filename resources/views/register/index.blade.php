@extends('layouts.base')
@section('title','Регистрация')


@section('content')

    <section>

        <div class="container">

            <div class="row">

                <div class="col-12 col-md-6 offset-md-3">

                    @component('components.card')

                        @component('components.card-header')

                            <h4 class="m-0 mb-2">
                                {{__('Регистрация')}}
                            </h4>



                        @endcomponent
                            @if($errors->any())
                                <div class="alert alert-danger small p-1">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $message)
                                            <li>
                                                {{$message}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @component('components.card-body')
                            <form action="{{route('registration.store')}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @component('components.form-item')

                                    <label class="required mb-1">{{__('Email')}}</label>

                                    <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                           autofocus>

                                @endcomponent

                                @component('components.form-item')

                                    <label class="required mb-1">{{__('Имя')}}</label>

                                    <input name="name" value="{{request()->old('name')}}" class="form-control"
                                           autofocus>
                                    @error('name')
                                    <div class="small text-danger ">
                                        {{$message}}
                                    </div>
                                    @enderror
                                @endcomponent


                                @component('components.form-item')

                                    <label class="required mb-1">{{__('Пароль')}}</label>

                                    <input type="password" value="{{request()->old('password')}}" name="password"
                                           class="form-control">

                                @endcomponent

                                @component('components.form-item')

                                    <label class="required mb-1">{{__('Повторите пароль')}}</label>

                                    <input type="password" name="password_confirmation" class="form-control">

                                    @error('password')
                                    <div class="small text-danger ">
                                        {{$message}}
                                    </div>
                                    @enderror
                                @endcomponent

                                @component('components.form-item')
                                    <div class="form-check">
                                        <input type="checkbox" value="1" name="agreement" class="form-check-input"
                                               id="remember">

                                        <label class="form-check-label" for="remember">
                                            {{__('Согласен с условиями')}}
                                        </label>
                                    </div>
                                    @error('agreement')
                                    <div class="small text-danger ">
                                        {{$message}}
                                    </div>
                                    @enderror
                                @endcomponent

                                <button type="submit" class="btn btn-primary">{{__('Зарегистрироваться')}}</button>

                            </form>

                        @endcomponent

                    @endcomponent

                </div>

            </div>

        </div>

    </section>

@endsection
