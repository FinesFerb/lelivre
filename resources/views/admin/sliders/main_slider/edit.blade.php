@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать слайд</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('main_slides.update', ['main_slide' => $main_slide]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <p>Путь к слайду: {{ $main_slide->path_to_slide }}<br><input type="file" accept="image/gif, image/png, image/jpeg, image/webp" name="path_to_slide" class="form-control"></p>
                            <br><hr>
                            <button type="submit" class="btn btn-success">Редактировать файл</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
