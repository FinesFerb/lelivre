@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить новую книгу</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <p>Имя: <br><input type="text" name="name" value="{{ old('name') }}" class="form-control" required="required"></p>
                            <p>Email: <br><input type="text" name="email" value="{{ old('email') }}" class="form-control" required="required"></p>
                            <p>Пароль: <br><input type="text" name="password" value="{{ old('password') }}" class="form-control" required="required"></p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Добавить файл</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
