@extends('layouts.index')

@section('title', 'Главная страница')
@section('description', 'Le livre - это онлайн библиотека, где вы сможете читать книги совершенно бесплатно.')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="/css/pages/main.css">
@endsection
@section('content')
<div class="top-margin">
    <div class="top-content">
        <div class="big-banner">
            <div class="swiper mySwiper swiper2">
                <div class="swiper-wrapper swiper2-wrapper">
                    @foreach($main_slides as $main_slide)
                        <div class="swiper-slide swiper2-slide"><img src="{{ asset('storage/main_slider/'.$main_slide->path_to_slide) }}" alt="main slide"></div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="discont-baner">
            <div class="discont-content">
                <div class="discont-title">
                    <h1 class="discont-title-h1">Классика</h1>
                    <div class="discont_button">
                        <img src="/img/icons/arrow.svg" class="discont_swiper_prev" style="display: block">
                        <img src="/img/icons/arrow.svg" class="discont_swiper_next" style="display: block">
                    </div>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper" style="width: 200px">
                        @foreach($categories[0]->books()->take(10)->get() as $book)
                            <div class="swiper-slide swiper1-slide">
                                <a href="{{ route('book.show', $book->id) }}">
                                    <img src="{{ asset('/storage/books_cover/'.$book->cover) }}" alt="classical books">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <form action="{{ route('search') }}">
                <input type="hidden" name="category" value="1">
                <button href="{{route('search')}}" class="btn_discont">
                    <h1 class="items-btn-discont">Больше классических книг</h1>
                </button>
            </form>
        </div>
    </div>
    <div class="main-banner">
        <div class="main-banner-left">
            <div class="main-banner-left-img">
                <img loading="lazy" class="img-main-banner img-main-banner1" src="/img/writer/banner1.png" alt="writer Zheli Vern">
            </div>
            <p class="p-img-main-banner">Жюль Габрие́ль Верн — французский писатель, классик приключенческой литературы, один из основоположников жанра научной фантастики. Член Французского Географического общества. По статистике ЮНЕСКО, книги Жюля Верна занимают второе место по переводимости в мире, уступая лишь произведениям Агаты Кристи.</p>
        </div>
        <div class="main-banner_divider"></div>
        <div class="main-banner-right">
            <div class="main-banner-right-img">
                <img loading="lazy" class="img-main-banner img-main-banner2" src="/img/writer/banner2.png" alt="writer Alexandr Duma">
            </div>
            <p class="p-img-main-banner">Алекса́ндр Дюма́ — французский писатель, драматург и журналист. Один из самых читаемых французских авторов, мастер приключенческого романа. Две самые известные его книги — «Граф Монте-Кристо» и «Три мушкетёра» — были написаны в 1844—1845 гг.</p>
        </div>
    </div>
    <div class="info">
        <div class="info_item">
            <h1 class="info_item_h1">Зарегистрируйтесь или войдите в свой профиль</h1>
            <img src="/img/info/profile.svg" alt="" class="info_item_img">
        </div>
        <div class="info_item">
            <h1 class="info_item_h1">Выберите книгу и добавьте в избранные</h1>
            <img src="/img/info/books.svg" alt="" class="info_item_img">
        </div>
        <div class="info_item">
            <h1 class="info_item_h1">Читайте онлайн или скачайте в ePub</h1>
            <img src="/img/info/open_book.svg" alt="" class="info_item_img">
        </div>
    </div>
    <div class="editors_choice_books">
        <h1 class="editors-choice-books_h1">Выбор редакции</h1>
        <div class="swiper-container">
            <div class="swiper-wrapper" style="width: 200px">
                @include('partials.editors_choice_books')
            </div>
        </div>
    </div>
    <div class="list-product">
        <div class="cards">
            @include('partials.books')
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <script src="/js/pages/main.js" defer></script>
@endsection
