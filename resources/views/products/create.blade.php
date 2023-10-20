@extends('layouts.product')
    @section('content-bg-color', '#374050')
    @section('content')
        <div class="content" id="formCreateId">
            <p class="main-text">Добавить продукт</p>
            <form action="{{route('product.store')}}" method="POST">
                @csrf
                <label for="articleId">Артикул</label>
                <div class="box-create">
                    <input id="articleId" name="article" value="{{ old('article') }}">
                    @error('article')<p style="color: red">{{$message}}</p>@enderror
                </div>

                <label for="nameId">Название</label>
                <div class="box-create">
                    <input id="nameId" name="name" value="{{ old('name') }}">
                    @error('name')<p style="color: red">{{$message}}</p>@enderror
                </div>

                <label for="selectorStatusId">Статус</label>
                <div class="box-create">
                    <select id="selectorStatusId" name="selectStatus">
                        <option selected value="true">Доуступен</option>
                        <option value="false">Заблокирован</option>
                    </select>
                </div>

                <div class="box-create" id="textAtrId">
                    <p class="main-text atr">Атрибуты</p>
                </div>
                <div class="box-create">
                    <p class="add-product" id="addProductBtnId">+Добавить атрибут</p>
                </div>

                <button class="btn" type="submit">Добавить</button>
            </form>
        </div>
    @endsection

