@extends('layouts.product')
    @section('content-bg-color', '#374050')
    @section('content')
        <div class="content" id="formCreateId">
            <p class="main-text">Добавить продукт</p>
            <form action="{{route('product.store')}}" method="POST">
                @csrf
                <label for="articleId">Article</label>
                <input id="articleId" name="article" value="{{ old('article') }}">
                @error('article')<p style="color: red">{{$message}}</p>@enderror

                <label for="nameId">Name</label>
                <input id="nameId" name="name" value="{{ old('name') }}">
                @error('name')<p style="color: red">{{$message}}</p>@enderror

                <label for="selectorStatusId">Статус</label>
                <select id="selectorStatusId" name="selectStatus">
                    <option selected value="true">Доуступен</option>
                    <option value="false">Заблокирован</option>
                </select>
                <p class="main-text">Атрибуты</p>
                <button type="button" id="addProductBtnId">Добавить атрибут</button>
                <button class="btn" type="submit">Добавить</button>
            </form>
        </div>
    @endsection

