@extends('layouts.product')
    @section('content')
        <div>
            <form action="{{route('product.update', ['product' => $product->id])}}" method="POST">
                @csrf
                <label for="nameId">Name</label>
                <input id="nameId" name="name" value="{{ $product?->name ?? old('name') }}">
                @error('name')<p style="color: red">{{$message}}</p>@enderror

                <label for="articleId">Article</label>
                <input id="articleId" name="article" value="{{ $product?->article ?? old('article') }}">
                @error('article')<p style="color: red">{{$message}}</p>@enderror

                <label for="sizeId">Size</label>
                <input id="sizeId" name="size" value="{{ $product?->data['size'] ?? old('size') }}">

                <label for="colorId">Color</label>
                <input id="colorId" name="color" value="{{ $product?->data['color'] ?? old('color') }}">

                <button type="submit">Update</button>
            </form>
        </div>
    @endsection

