@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить новую книгу</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                            @csrf
                            <p>Название: <br><input type="text" name="title" value="{{ old('title') }}" class="form-control" required="required"></p>
                            <p>Картинка: <br><input type="file" accept="image/gif, image/png, image/jpeg, image/webp" name="cover" value="{{ old('cover') }}" class="form-control" required="required"></p>
                            <p>Автор: <br><input type="text" name="author" value="{{ old('author') }}" class="form-control" required="required"></p>
                            <p>Категория: <br>
                                @forelse($categories as $category)
                                    <input type="checkbox" name="category[]" id="category" value="{{ $category->id }}">
                                    <label for="category">{{ $category->title }}</label>
                                    <br>
                                @empty
                                    Нет категорий
                                @endforelse
                            </p>
                            <p>Кол-во страниц: <br><input type="number" name="page_count" value="{{ old('page_count') }}" class="form-control" required="required"></p>
                            <p>Время чтения: <br><input type="time" name="reading_time" value="{{ old('reading_time') }}" class="form-control" required="required"></p>
                            <p>Год издания: <br><input type="number" name="year_of_publication" value="{{ old('year_of_publication') }}" class="form-control" required="required"></p>
                            <p>Возрастное ограничение: <br><input type="number" name="age_restriction" value="{{ old('age_restriction') }}" class="form-control" required="required"></p>
                            <p>Описание: <br><textarea rows="10" type="text" name="description" class="form-control" required="required">{{ old('description') }}</textarea></p>
                            <p>Дата написания: <br><input type="date" name="date_of_writing" value="{{ old('date_of_writing') }}" class="form-control" required="required"></p>
                            <p>Объем: <br><input type="number" name="volume" value="{{ old('volume') }}" class="form-control" required="required"></p>
                            <p>ISBN(EAN): <br><input type="text" name="isbn" value="{{ old('isbn') }}" class="form-control" required="required"></p>
                            <p>Переводчик: <br><input type="text" name="interpreter" value="{{ old('interpreter') }}" class="form-control" required="required"></p>
                            <p>Книга в epub: <br><input type="file" accept="application/epub+zip" name="epub" value="{{ old('epub') }}" class="form-control" required="required"></p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Добавить файл</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
