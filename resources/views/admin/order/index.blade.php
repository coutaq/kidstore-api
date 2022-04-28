@extends('adminlte::page')

@section('title', 'Заказы')

@section('content_header')
<h1>Заказы</h1>
@stop

@section('content')
@php
$heads = [
'№',
'Товар',
"Пользователь",
"Количество"
['label' => 'Действия', 'no-export' => true, 'width' => 5],

];


$config = [
'language' => ['url'=>'//cdn.datatables.net/plug-ins/1.11.4/i18n/ru.json']
];
@endphp

<x-adminlte-datatable id="table1" :heads="$heads" with-buttons :config="$config">
    @foreach($orders as $order)
    <tr>
        <td>
            {{$order->id}}
        </td>
        <td>
            {{$order->product_id}}
        </td>
        <td>
            {{$order->user_id}}
        </td>
        <td>
            {{$subcategory->amount}}
        </td>

        <td>

            <a class='btn btn-warning' href='{{route("order.edit", ["order"=>$order])}}'>✏️
            </a>

            <form action="{{route('order.destroy', ['order'=>$order])}}" method="POST">
                @csrf
                @method("delete")
                <button type='submit' class='btn btn-danger'>🗑️</button>
            </form>
        </td>

    </tr>
    @endforeach
</x-adminlte-datatable>


@stop
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
