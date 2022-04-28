@extends('adminlte::page')

@section('title', 'Товар')
@section('content')
<div class="d-flex flex-column justify-content-center">
    <h1 class="text-center">{{$product->title}}</h1>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ID</td>
                <td>{{ $product->id }}</td>

                <td>Название</td>
                <td>{{ $product->title }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <td>Скидка</td>
                <td>{{ $product->discount }}</td>
            </tr>
            <tr>
                <td>Количество</td>
                <td>{{ $product->amount }}</td>
            </tr>
            <tr>
                <td>Подкатегория</td>
                <td>{{ $product->subcategory_id }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{$product->image}}" height="240px"></td>
            </tr>

        </tbody>
    </table>
</div>
@endsection
