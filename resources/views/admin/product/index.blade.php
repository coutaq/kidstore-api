@extends('adminlte::page')

@section('title', 'Продукты')

@section('content_header')
<h1>Продукты</h1>
@stop

@section('content')
@php
$heads = [
'№',
'Наименование',
'Описание',
"Цена",
"Скидка",
"Количество",
"Изображение",
"Подкатегории",
['label' => 'Действия', 'no-export' => true, 'width' => 5],

];


$config = [
'language' => ['url'=>'//cdn.datatables.net/plug-ins/1.11.4/i18n/ru.json']
];
@endphp

<a class="btn btn-success mx-auto" type="button" href="{{ route('product.create') }}">➕</a>
<x-adminlte-datatable id="table1" :heads="$heads" with-buttons :config="$config">
    @foreach($products as $product)
    <tr>
        <td>
            {{$product->id}}
        </td>
        <td>
            {{$product->title}}
        </td>
        <td>
            {{$product->description}}
        </td>
        <td>
            {{$product->price}}
        </td>
        <td>
            {{$product->discount}}
        </td>
        <td>
            {{$product->amount}}
        </td>
        <td>
            {{$product->image}}
        </td>
        <td>
            {{$product->subcategory_id}}
        </td>
        <td>

            <a class='btn btn-warning' href='{{route("product.edit", ["product"=>$product])}}'>✏️
            </a>

            <form action="{{route('product.destroy', ['product'=>$product])}}" method="POST">
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
