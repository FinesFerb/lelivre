@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Список книг</div>
                    <div class="card-body">
                        <a href="{{ route('editors_choice_books.create') }}" class="btn btn-primary">Добавить</a><br>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Книга</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($editorsChoiceBooks as $editorsChoiceBook)
                                    <tr>
                                        <td>{{$editorsChoiceBook->book->title}}</td>
                                        <td class="inline-block"><a class="btn btn-info btn-sm" style="display: block;" href="{{ route('editors_choice_books.edit', ['editors_choice_book' => $editorsChoiceBook]) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <br>
                                            <form id="delete-form" action="{{ route('editors_choice_books.destroy', ['editors_choice_book' => $editorsChoiceBook]) }}" method="POST" style="display: grid">
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
