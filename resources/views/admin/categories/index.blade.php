@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Список категорий</div>
                    <div class="card-body">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Добавить</a><br>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}</td>
                                        <td class="inline-block"><a class="btn btn-info btn-sm" style="display: block;" href="{{ route('categories.edit', ['category' => $category]) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <br>
                                            <form id="delete-form" action="{{ route('categories.destroy', ['category' => $category]) }}" method="POST" style="display: grid">
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
                                        <td colspan="2">Нет зарегестрированных пользователей</td>
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
