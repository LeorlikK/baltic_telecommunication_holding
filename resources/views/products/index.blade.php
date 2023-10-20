@extends('layouts.product')
    @section('menu')
        @include('products.components.menu')
    @endsection
    @section('content')
        <div class="content">
            <div class="lala">
                <div class="product">
                    <p>Продукты</p>
                    <div class="red-line"></div>
                </div>
                <div class="name">
                    <p>Иванов Иван Иванович</p>
                </div>
            </div>
            <div class="lala2">
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
                                @foreach($product->data as $key => $value)
                                    {{ "$key: $value" }}<br>
                                @endforeach
                            </td>
                        </tr>
                        @can('view', auth()->user())

                        @endcan
                    @endforeach
                    </tbody>
                </table>
                <div class="add-button">
                    <button id="addProductId"><a href="#">Добавить</a></button>
                    <div id="windowAddProductId" class="add-product">
                        <div class="modal-add">
                            <p>Добавить продукт</p>
                            <form action="{{route('product.store')}}" method="POST">
                                @csrf
                                <div>
                                    <label for="articleId">Артикул</label>
                                    <input id="articleId" name="article" value="{{ old('article') }}">
                                    @error('article')<p style="color: red">{{$message}}</p>@enderror
                                </div>

                                <div>
                                    <label for="nameId">Название</label>
                                    <input id="nameId" name="name" value="{{ old('name') }}">
                                    @error('name')<p style="color: red">{{$message}}</p>@enderror
                                </div>

                                <div>
                                    <label for="selectorStatusId">Статус</label>
                                    <select id="selectorStatusId" name="selectStatus">
                                        <option selected value="true">Доуступен</option>
                                        <option value="false">Заблокирован</option>
                                    </select>
                                </div>

                                <p id="textAtrId">Атрибуты</p>

                                <div class="atr">
                                    <p id="addProductBtnId">+Добавить атрибут</p>
                                    <button type="submit">Добавить</button>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
