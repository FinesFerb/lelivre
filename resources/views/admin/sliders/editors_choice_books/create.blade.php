@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить новую книгу в выбор редакции</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('editors_choice_books.store') }}">
                            @csrf
                            <p>Книга: <br>
                            <select name="book">
                                @forelse($books as $book)
                                    <option value="{{ $book->id }}">{{$book->title}}</option>
                                @empty
                                    <p>Нет загруженных книг</p>
                                @endforelse
                            </select>
                            </p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
