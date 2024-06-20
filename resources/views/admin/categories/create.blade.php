@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить новую книгу</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('categories.store') }}">
                            @csrf
                            <p>Имя: <br><input type="text" name="title" value="{{ old('title') }}" class="form-control" required="required"></p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Добавить файл</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
