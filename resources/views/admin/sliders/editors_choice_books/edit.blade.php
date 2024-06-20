@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать книгу</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('editors_choice_books.update', ['editors_choice_book' => $editorsChoiceBook]) }}">
                            @csrf
                            @method('PUT')
                            <p>Книга: <br>
                                <select name="book">
                                    @forelse($books as $book)
                                        <option value="{{ $book->id }}" @if($editorsChoiceBook->book->id === $book->id) selected @endif>{{$book->title}}</option>
                                    @empty
                                        <p>Нет загруженных книг</p>
                                    @endforelse
                                </select>
                            </p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Редактировать файл</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
