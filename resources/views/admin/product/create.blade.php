@inject('subcategories', 'App\Services\SubcategoryService')

@extends('adminlte::page')


@section('title', 'Товары')
@section('content_header')
<h1>Новый товар</h1>
@stop

@section('content')
@foreach ($errors->all() as $error)
<div style="width:50%" class="alert alert-danger">{{ $error }}</div>
@endforeach
<form action="/admin/product" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="width:49.5%">
        {{-- <x-adminlte-input-file name="image" label="Изображение" disable-feedback accept="image/png, image/jpeg">
            <x-slot name="prependSlot">
                <div class="input-group-text text-primary">
                    <i class="fas fa-file-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file> --}}
        <x-adminlte-input name="image" label="Ссылка на изображение" fgroup-class="col-md-6" disable-feedback />
    </div>

    <div class="row">
        <x-adminlte-input name="title" label="Наименование" fgroup-class="col-md-6" disable-feedback />
    </div>
    <div class="row">
        <x-adminlte-input name="description" label="Описание" fgroup-class="col-md-6" disable-feedback />
    </div>
    <div class="row">
        <x-adminlte-input name="description" label="Цена" fgroup-class="col-md-6" disable-feedback />
    </div>
    <div class="row">
        <x-adminlte-input name="description" label="Скидка" fgroup-class="col-md-6" disable-feedback />
    </div>
    <div class="row">
        <x-adminlte-input name="description" label="Количество" fgroup-class="col-md-6" disable-feedback />
    </div>

    <div class="row">
        <x-adminlte-select name="subcategory_id" label="Vehicle" label-class="text-lightblue" igroup-size="lg">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-bone"></i>
                </div>
            </x-slot>
            @foreach($subcategories->browse() as $s)
            <option value="{{$s->id}}">{{$s->title}}</option>
            @endforeach
        </x-adminlte-select>
    </div>


    <button type='submit' class="btn btn-primary">Создать</button>
</form>
@stop
