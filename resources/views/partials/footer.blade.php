<div class="footer_container">
    <div class="footer">
        <div class="footer-left footer_item">
            <div class="title-footer-left title-footer">
                <h1>Наши соцсети</h1>
            </div>
            <li class="footer-left-item"><a href="">Ютуб</a></li>
            <li class="footer-left-item"><a href="">Вконтакте</a></li>
            <li class="footer-left-item"><a href="">Телеграм</a></li>
            <li class="footer-left-item"><a href="">Дзен</a></li>
        </div>
        <div class="footer-center footer_item">
            <div class="title-footer-center title-footer">
                <h1>Каталог</h1>
            </div>
            @forelse($categories as $category)
                <form action="{{ route('search') }}" method="get">
                    <input type="hidden" name="category" value="{{ $category->id }}">
                    <button class="li-footer-center category_form_btn">
                        {{ $category->title }}
                    </button>
                </form>
            @empty
                <p>Нет категорий</p>
            @endforelse
        </div>
        <div class="footer-right footer_item">
            <div class="title-footer-right title-footer">
                <h1 class="footer_h1">Помощь</h1>
            </div>
            <li class="li-footer-right"><a href="">Поддержка</a></li>
            <li class="li-footer-right"><a href="">Партнерство</a></li>
            <li class="li-footer-right"><a href="">Напишите нам</a></li>
            <li class="li-footer-right"><a href="">Пользовательское соглашение</a></li>
        </div>
    </div>
</div>
