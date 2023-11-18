@extends('layouts.base')
@section('title','ADMIN')


@section('content')
    <section>
        @component('components.container')
            <div>
                @foreach($products as $arr)
                    <form method="POST" action="{{route('admin.update',$arr->id)}}">
                        @csrf
                        <div class="">
                            <label>Название</label>
                            <input type="text" name="name" value="{{$arr->name}}" class="form-control">

                            <label>Описание</label>
                            <textarea name="description" class="form-control">{{$arr->description}} </textarea>

                            <label>Цена</label>
                            <input type="number" name="price" value="{{$arr->price}}" class="form-control">

                            <label>Количество</label>
                            <input type="number" name="amount" value="{{$arr->amount}}"
                                   class="form-control">
                            <label>Категория</label>
                            <select name="categoryId" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            <form method="POST" action="{{route('admin.update',$arr->id)}}">
                                @method('PUT')
                                @csrf
                                <input type="submit" value="Утвердить" name="update">
                            </form>
                            <form method="POST" action="{{route('admin.delete',$arr->id)}}">
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
                <form method="post" action="{{route('admin.store')}}">
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
                        <label>Описание</label>
                        <textarea name="descriptionNew" class="form-control"> </textarea>

                        <label>Цена</label>
                        <input type="number" name="priceNew" value="" class="form-control">

                        <label>Количество</label>
                        <input type="number" name="amountNew" value="" class="form-control">
                        <label>Категория</label>
                        <select name="categoryIdNew" class="form-control" value="{{request('category_id')}} ">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
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
