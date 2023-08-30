@extends('layouts.product')
@section('content-bg-color', '#374050')
@section('content')
    <div class="content">
        <p class="name">{{ $product->name }}</p>
        <div>
            <p>Артикул</p>
            <p>{{ $product->article }}</p>
        </div>
        <div>
            <p>Название</p>
            <p>{{ $product->article }}</p>
        </div>
        <div>
            <p>Статус</p>
            <p>{{ $product->article }}</p>
        </div>
        <div>
            <p>Атрибуты</p>
            <p>{{ $product->article }}</p>
        </div>
    </div>
@endsection
