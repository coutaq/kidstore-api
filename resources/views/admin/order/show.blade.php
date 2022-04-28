@extends('adminlte::page')

@section('title', 'Заказы')
@section('content')
<div class="d-flex flex-column justify-content-center">
    <h1 class="text-center">{{$order->title}}</h1>
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
                <td>{{ $order->id }}</td>
            </tr>
            {{-- <tr>
                <td>Товар</td>
                <td>{{ $order->product_id }}</td>
            </tr> --}}
            <tr>
                <td>Пользователь</td>
                <td>{{ $order->user_id }}</td>
            </tr>
            <tr>
                <td>Количество</td>
                <td>{{ $order->amont }}</td>
            </tr>


        </tbody>
    </table>
</div>
@endsection
