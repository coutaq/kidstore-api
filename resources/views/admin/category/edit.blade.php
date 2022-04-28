@extends('adminlte::page')

@section('title', 'Категории')

@section('content')
<div class="col-md-12">
    @isset($category)
    <h1>Редактировать Категорию <b>{{ $category->name }}</b></h1>
    @else
    <h1>Добавить Категорию</h1>
    @endisset

    <form method="POST" enctype="multipart/form-data" @isset($category)
        action="{{ route('category.update', $category) }}" @else action="{{ route('category.store') }}" @endisset>
        @method('PUT')
        <div>
            @isset($category)

            @endisset
            @csrf

            <br>
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Название: </label>
                <div class="col-sm-6">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" title="title" id="name"
                        value="@isset($category){{ $category->title }}@endisset">
                </div>

            </div>
            <br>
            <div class="input-group row">
                <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                <div class="col-sm-6">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea name="description" id="description" cols="72"
                        rows="7">@isset($category){{ $category->description }}@endisset</textarea>
                </div>
            </div>
            <br>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group row">

                <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                {{-- <div class="col-sm-10">
                    <label class="btn btn-default btn-file">
                        Загрузить <input type="file" style="display: none;" name="image" id="image">
                    </label>
                </div> --}}
                <x-adminlte-input name="image" label="Ссылка на изображение" fgroup-class="col-md-6" disable-feedback />
            </div>
        </div>
        <button type='submit' class="btn btn-success">Сохранить</button>
</div>
</form>
</div>
@endsection
