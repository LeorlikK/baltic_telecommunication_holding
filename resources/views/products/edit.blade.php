@extends('layouts.product')
    @section('content-bg-color', '#374050')
    @section('content')
        <div>
            <form id="formCreateId" action="{{route('product.update', ['product' => $product->id])}}" method="POST">
                @csrf
                <label for="nameId">Name</label>
                <input id="nameId" name="name" value="{{ old('name') ?? $product?->name }}">
                @error('name')<p style="color: red">{{$message}}</p>@enderror

                <label for="articleId">Article</label>
                <input id="articleId" name="article" value="{{ old('article') ?? $product?->article}}">
                @error('article')<p style="color: red">{{$message}}</p>@enderror

                <label for="selectorStatusId">Статус</label>
                <select id="selectorStatusId" name="selectStatus">
                    <option @php($product->status === 'available' ? 'selected' : '') value="true">Доуступен</option>
                    <option @php($product->status === 'unavailable' ? 'selected' : '') value="false">Заблокирован</option>
                </select>

                <p class="main-text">Атрибуты</p>
                @php($i = 0)
                @foreach($product->data as $key => $value)
                    @php(++$i)
                    <div class="add-product-block">
                        <label for="addProductNameId_<?=$i?>">Название</label>
                        <input class="add-product-name" id="addProductNameId_<?=$i?>" name="attributes_name[<?=$i?>]" value="{{$key}}">
                        <label for="addProductValueId_<?=$i?>">Значение</label>
                        <input class="add-product-value" id="addProductValueId_<?=$i?>" name="attributes_value[<?=$i?>]" value="{{$value}}">
                        <button type="button" class="addProductDelete" id="addProductDeleteId_<?=$i?>">Delete</button>
                    </div>
                @endforeach
                <button type="button" id="addProductBtnId">Добавить атрибут</button>
                <button class="btn" type="submit">Сохранить</button>
            </form>
        </div>
    @endsection

