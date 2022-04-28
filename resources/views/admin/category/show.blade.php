@extends('adminlte::page')

@section('title', 'Категории')
@section('content')
<div class="d-flex flex-column justify-content-center">
    <h1 class="text-center">{{$category->title}}</h1>
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
                <td>{{ $category->id }}</td>
            </tr>
            {{-- <tr>
                <td>Код</td>
                <td>{{ $category->code }}</td>
            </tr> --}}
            <tr>
                <td>Название</td>
                <td>{{ $category->title }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{$category->image}}" height="240px"></td>
            </tr>

        </tbody>
    </table>
</div>
@endsection
