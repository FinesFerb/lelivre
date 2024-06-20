@forelse($editors_choice_books as $editors_choice_book)
    <div class="swiper-slide">
        <div class="card" style="border: none;">
            <div class="main-card">
                <div class="img-card">
                    <a class="adaptive-img" href="{{ Route('book.show', ['book' => $editors_choice_book->book]) }}">
                        <img class="img-book" loading="lazy" src="{{ asset('storage/books_cover/'.$editors_choice_book->book->cover) }}" alt="">
                    </a>
                </div>
                <div class="description-card">
                    <div class="title-card">
                        <a href="{{ Route('book.show', ['book'=>$editors_choice_book->book]) }}" style="text-decoration: none;"><p class="name-book">{{$editors_choice_book->book->title}}</p></a>
                        <a class="aftor" href="{{ Route('book.show', ['book' => $editors_choice_book->book]) }}" style="text-decoration: none;">{{$editors_choice_book->book->writer}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <tr>
        <td colspan="2">Нет загруженных книг</td>
    </tr>
@endforelse
