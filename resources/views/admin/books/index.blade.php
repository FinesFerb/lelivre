@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Список книг</div>
                    <div class="card-body">
                        <a href="{{ route('books.create') }}" class="btn btn-primary">Добавить</a><br>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Картинка</th>
                                        <th>Автор</th>
                                        <th>Категория</th>
                                        <th>Кол-во страниц</th>
                                        <th>Время чтения</th>
                                        <th>Год издания</th>
                                        <th>Возрастное ограничение</th>
                                        <th>Описание</th>
                                        <th>Дата написания</th>
                                        <th>Объем</th>
                                        <th>ISBN(EAN)</th>
                                        <th>Переводчик</th>
                                        <th>Книга в epub</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($books as $book)
                                    <tr>
                                        <td>{{$book->title}}</td>
                                        <td><a href="{{ route('books.download', $book->id) }}">{{ $book->cover }}</a></td>
                                        <td>{{$book->author}}</td>
                                        <td>
                                            @forelse($book->categories as $category)
                                                {{ $category->title }}
                                            @empty
                                                Нет категорий
                                            @endforelse
                                        </td>
                                        <td>{{$book->page_count}}</td>
                                        <td>{{$book->reading_time}}</td>
                                        <td>{{$book->year_of_publication}}</td>
                                        <td>{{$book->age_restriction}}</td>
                                        <td class="text-truncate" style="max-width: 150px;">{{$book->description}}</td>
                                        <td>{{$book->date_of_writing}}</td>
                                        <td>{{$book->volume}}</td>
                                        <td>{{$book->isbn}}</td>
                                        <td>{{$book->interpreter}}</td>
                                        <td>{{$book->epub}}</td>
                                        <td class="inline-block"><a class="btn btn-info btn-sm" style="display: block; width: 130px" href="{{ route('books.edit', ['book'=>$book]) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <br>
                                            <form id="delete-form" action="{{ route('books.destroy', ['book'=>$book]) }}" method="POST" style="display: grid">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                    <i class="fas fa-trash"></i>
                                                    Удалить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Нет загруженных книг</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/237f9759d1.js" crossorigin="anonymous"></script>
@stop
