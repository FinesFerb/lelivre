@extends('layouts.index')

@section('title', 'Моя полка')
@section('description', 'Здесь размещены все добавленные вами книги, вы можете их убрать или добавить новые.')
@section('styles')
    <link rel="stylesheet" href="/css/pages/library.css">
@endsection
@section('content')
<div class="container_main-list">
    <div class="main_list">
        <h1 class="title_h1" style="text-align: center">Мои книги</h1>
        <div class="capt" style="border-bottom: 1px solid #858484;background: 0; border-radius: 0;">
            <span class="span_search">Книги </span>
            <span class="span_search">Подборки </span>
        </div>
        <div class="flex-listok">
            <div class="cards" style="margin-left: 0px">
                @include('partials.bookshelf')
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
