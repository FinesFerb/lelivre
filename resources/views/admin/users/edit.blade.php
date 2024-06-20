@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать книгу</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('users.update', ['user'=>$user]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <p>Имя: <br><input type="text" name="name" value="{{ $user->name }}" class="form-control"></p>
                            <p>Email: <br><input type="text" name="email" value="{{ $user->email }}" class="form-control"></p>
                            <p>Пароль: <br><input type="text" name="password" value="{{ $user->password }}" class="form-control"></p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Редактировать файл</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
