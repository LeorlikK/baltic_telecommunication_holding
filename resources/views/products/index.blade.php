@extends('layouts.product')
    @section('menu')
        @include('products.components.menu')
    @endsection
    @section('content')
        <div>
            <button class="btn btn-create"><a href="{{route('product.create')}}">Create</a></button>
            <table class="table">
                <thead>
                    <tr>
                        <th>АРТИКУЛ</th>
                        <th>НАЗВАНИЕ</th>
                        <th>СТАТУС</th>
                        <th>АТРИБУТЫ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <a href="{{ route('product.show', ['product' => $product->id]) }}">{{ Str::limit($product->article, 10) }}</a>
                            </td>
                            <td>{{ Str::limit($product->name, 10) }}</td>
                            <td>{{ $product->status }}</td>
                            <td>
                                {{ $product->dataFullString }}
{{--                                @foreach($product->data as $key => $value)--}}
{{--                                    {{ "$key: $value" }}<br>--}}
{{--                                @endforeach--}}
                            </td>
                        </tr>
{{--                        <button><a href="{{route('product.show', ['product' => $product->id])}}">Show</a></button>--}}
{{--                        @can('view', auth()->user())--}}
{{--                            <button><a href="{{route('product.edit', ['product' => $product->id])}}">Edit</a></button>--}}
{{--                            <form action="{{route('product.delete', ['product' => $product->id])}}" method="Post">--}}
{{--                                @csrf--}}
{{--                                <button type="submit">Delete</button>--}}
{{--                            </form>--}}
{{--                        @endcan--}}
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
