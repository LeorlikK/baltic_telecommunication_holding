@extends('layouts.product')
@section('content-bg-color', '#374050')
@section('content')
    <div class="content">
        <p class="name">Редактировать {{ $product->name }}</p>

        <div class="box-show">
            <p>Артикул</p>
            <p>{{ $product->article }}</p>
        </div>
        <div class="box-show">
            <p>Название</p>
            <p>{{ $product->name }}</p>
        </div>
        <div class="box-show">
            <p>Статус</p>
            <p>{{ $product->status }}</p>
        </div>
        <div class="box-show">
            <p class="name atr">Атрибуты</p>
            <p>{{ $product->dataFullString }}</p>
        </div>

        <button><a href="{{route('product.edit', ['product' => $product->id])}}">@include('svg.edit')</a></button>
        <form action="{{route('product.delete', ['product' => $product->id])}}" method="Post">
            @csrf
            <button><a href="{{route('product.delete', ['product' => $product->id])}}">@include('svg.delete')</a></button>
        </form>
    </div>
@endsection
