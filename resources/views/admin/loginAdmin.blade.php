@extends('admin.layoutsAdmin.base')
@section('title','Админка')


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
                            <form action="{{route('admin.login')}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @component('components.form-item')

                                    @component('components.label')
                                        {{__('Email')}}
                                    @endcomponent

                                    <input type="email" name="email" value="" class="form-control"
                                           autofocus>

                                @endcomponent

                                @component('components.form-item')

                                    @component('components.label')
                                        {{__('Пароль')}}
                                    @endcomponent

                                    <input type="password" name="password" value=""
                                           class="form-control">
                                    @error('password')
                                    <div class="small text-danger ">
                                        {{$message}}
                                    </div>
                                    @enderror

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
