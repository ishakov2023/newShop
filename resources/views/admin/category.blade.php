@extends('admin.layoutsAdmin.base')
@section('title','ADMIN')


@section('content')
    <section>
        @component('components.container')
            <div>
                @foreach($categories as $arr)
                    <form method="POST" action="{{route('category.update',$arr->id)}}">
                        @csrf
                        <div class="">
                            <label>Название</label>
                            <input type="text" name="name" value="{{$arr->name}}" class="form-control">

                            <form method="POST" action="{{route('category.update',$arr->id)}}">
                                @method('PUT')
                                @csrf
                                <input type="submit" value="Утвердить" name="update">
                            </form>
                            <form method="POST" action="{{route('category.delete',$arr->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" >Удалить</button><br>
                            </form>
                        </div>
                    </form>
                @endforeach
            </div>
            <br>

            <div>
                <form method="post" action="{{route('category.store')}}">
                    @csrf
                    <div class="">
                        <label>Название</label>
                        <input type="text" name="nameNew" value="" class="form-control">
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

                        <input type="submit" value="Создать" name="creat">
                    </div>
                </form>
            </div>
            <br>
            <div class="col-12 col-md-4">
                <div class="mb-4 card">
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.logout')}}">
                            @csrf
                            <input type="submit" name="logout" value="Выход">
                        </form>
                    </div>
                </div>
            </div>
        @endcomponent

    </section>

@endsection
