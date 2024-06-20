@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать книгу</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('categories.update', ['category' => $category]) }}">
                            @csrf
                            @method('PUT')
                            <p>Имя: <br><input type="text" name="title" value="{{ $category->title }}" class="form-control" required></p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Редактировать файл</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
