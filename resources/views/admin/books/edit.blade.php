@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать книгу</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('books.update', ['book'=>$book]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <p>Название: <br><input type="text" name="title" value="{{ $book->title }}" class="form-control" required></p>
                            <p>Картинка: {{ $book->cover }}<br><input type="file" accept="image/gif, image/png, image/jpeg, image/webp" name="cover" class="form-control"></p>
                            <p>Автор: <br><input type="text" name="author" value="{{ $book->author }}" class="form-control" required></p>
                                @foreach($categories as $category)
                                    @if($book->categories->contains($category))
                                        <input type="checkbox" name="category[]" id="category" value="{{ $category->id }}" checked>
                                        <label for="category">{{ $category->title }}</label>
                                        <br>
                                    @else
                                        <input type="checkbox" name="category[]" id="category" value="{{ $category->id }}">
                                        <label for="category">{{ $category->title }}</label>
                                        <br>
                                    @endif
                                @endforeach
                            <p>Кол-во страниц: <br><input type="number" name="page_count" value="{{ $book->page_count }}" class="form-control" required></p>
                            <p>Время чтения: <br><input type="time" name="reading_time" value="{{ $book->reading_time }}" class="form-control" required></p>
                            <p>Год издания: <br><input type="number" name="year_of_publication" value="{{ $book->year_of_publication }}" class="form-control" required></p>
                            <p>Возрастное ограничение: <br><input type="number" name="age_restriction" value="{{ $book->age_restriction }}" class="form-control" required></p>
                            <p>Описание: <br><textarea rows="10" type="text" name="description" class="form-control" required>{{ $book->description }}</textarea></p>
                            <p>Дата написания: <br><input type="date" name="date_of_writing" value="{{ $book->date_of_writing }}" class="form-control" required></p>
                            <p>Объем: <br><input type="number" name="volume" value="{{ $book->volume }}" class="form-control" required></p>
                            <p>ISBN(EAN): <br><input type="text" name="isbn" value="{{ $book->isbn }}" class="form-control" required></p>
                            <p>Переводчик: <br><input type="text" name="interpreter" value="{{ $book->interpreter }}" class="form-control" required></p>
                            <p>Книга в epub: {{ $book->epub }}<br><input type="file" accept="application/epub+zip" name="epub" class="form-control"></p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Редактировать файл</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
