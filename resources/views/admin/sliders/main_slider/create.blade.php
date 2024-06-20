@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить новый слайд</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('main_slides.store') }}" enctype="multipart/form-data">
                            @csrf
                            <p>Путь к файлу: <br><input type="file" accept="image/png, image/jpeg, image/gif, image/webp" name="path_to_slide" value="{{ old('path_to_slide') }}" class="form-control" required></p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Добавить файл</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
