<div class="header_container">
    <div class="header">
        <div class="header-left">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border: none; background: left;">
                <img class="header-icon" src="/img/icons/catalog.svg" alt="catalog">
            </button>
            <!-- Модальное окно -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Категории</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body" style="display: flex; flex-direction: column; gap: 10px">
                            @forelse($categories as $category)
                                <form action="{{ route('search') }}" method="get">
                                    <input type="hidden" name="category" value="{{ $category->id }}">
                                    <button class="category_form_btn">
                                        {{ $category->title }}
                                    </button>
                                </form>
                            @empty
                                <p>Нет категорий</p>
                            @endforelse
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/"><img class="logo" src="/img/icons/logo.svg" alt="logo"></a>
        </div>
        <div class="header-center">
            <div class="search">

                <form class="forma" action="{{ route('search') }}" method="get">
                    <input class="search-form" value="{{ request('search') }}" name="search" id="search" placeholder="Искать здесь..." type="search" required>
                    <button type="submit" class="search-btn"><img class="img-search-btn" src="/img/icons/search.svg" alt=""></button>
                </form>

            </div>
        </div>
        <div class="header-right">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('profile.edit') }}"><img class="header-icon" src="/img/icons/profile2.svg" alt=""></a>
                    <a href="{{ route('library.index') }}"><img class="header-icon" src="/img/icons/book2.svg" alt=""></a>
                @else
                    <a href="{{ route('login') }}"><img class="header-icon" src="/img/icons/profile1.svg" alt=""></a>
                    <a href="{{ route('login') }}"><img class="header-icon" src="/img/icons/book1.svg" alt=""></a>
                @endauth
            @endif
        </div>
        <div class="lower-menu">
            @forelse($categories as $category)
                <form action="{{ route('search') }}" method="get">
                    <input type="hidden" name="category" value="{{ $category->id }}">
                    <button class="lower-menu-a category_form_btn">
                        {{ $category->title }}
                    </button>
                </form>
            @empty
                <p>Нет категорий</p>
            @endforelse
        </div>
    </div>
</div>
