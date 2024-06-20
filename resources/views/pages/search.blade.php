@extends('layouts.index')

@section('title', 'Поиск')
@section('description', 'Здесь вы можете найти нужную вам книгу, а также воспользуйтесь фильтрами для удобного поиска.')
@section('styles')
<link rel="stylesheet" href="/css/pages/search.css">
@endsection
@section('content')
<div class="container_main-list">
    <div class="main_list">
        @if(!empty(request('search')))
            <h1 class="title_h1">Результаты поиска "{{ request('search') }}"</h1>
        @endif
        <div class="capt">
            <span class="span_search">Книги </span>
            <span class="span_search">Подборки </span>
        </div>
        <div class="container_filter-modal">
            <button class="filter_btn" type="button" data-bs-toggle="modal" data-bs-target="#filterModal">
                <img class="filter_img" src="img/icons/filters.svg">
            </button>
            <div class="modal fade" id="filterModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="filterModalLabel">Фильтры</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <div class="filters_item">
                                <h1 class="h1_format">Категории</h1>
                                <form action="{{ route('search') }}" method="get">
                                    @if(!empty(request('search')))
                                        <input type="hidden" name="search" value="{{ request('search') }}">
                                    @endif
                                    <select name="category" class="form_select">
                                        @forelse($categories as $category)
                                            <option value="{{ $category->id }}" @if(request('category') == $category->id) selected @endif>
                                                {{ $category->title }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <button>Применить фильтры</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-listok">
            <div class="filters">
                <div class="filters_item">
                    <h1 class="h1_format">Категории</h1>
                    <form action="{{ route('search') }}" method="get">
                        @if(!empty(request('search')))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        <select name="category" class="form_select">
                            @forelse($categories as $category)
                                <option value="{{ $category->id }}" @if(request('category') == $category->id) selected @endif>
                                    {{ $category->title }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        <button>Применить фильтры</button>
                    </form>
                </div>
            </div>
            <div class="list">
                @if(!empty(request('category')))
                    <div class="cards_filter__current">
                        <form action="{{ route('search') }}" method="get">
                            @if(!empty(request('search')))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            <span class="filter_current_span">
                                {{ $categories[request('category') - 1]->title }}
                            </span>
                            <button><img src="/img/icons/cross_white.svg" alt=""></button>
                        </form>
                    </div>
                @endif
                <div class="cards">
                    @include('partials.books')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
