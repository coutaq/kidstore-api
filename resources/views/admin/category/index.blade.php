@extends('adminlte::page')

@section('title', 'Категории')

@section('content_header')
<h1>Категории</h1>
@stop

@section('content')
@php
$heads = [
'№',
'Наименование',
'Описание',
"Изображение",
['label' => 'Действия', 'no-export' => true, 'width' => 5],

];


$config = [
'language' => ['url'=>'//cdn.datatables.net/plug-ins/1.11.4/i18n/ru.json']
];
@endphp

<x-adminlte-datatable id="table1" :heads="$heads" with-buttons :config="$config">
    @foreach($categories as $category)
    <tr>
        <td>
            {{$category->id}}
        </td>
        <td>
            {{$category->title}}
        </td>
        <td>
            {{$category->description}}
        </td>
        <td>
            {{$category->image}}
        </td>
        <td>
            <a class="btn btn-success mx-auto" type="button" href="{{ route('category.create') }}">➕</a>
            <a class='btn btn-warning' href='{{route("category.edit", ["category"=>$category])}}'>✏️
            </a>

            <form action="{{route('category.destroy', ['category'=>$category])}}" method="POST">
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
