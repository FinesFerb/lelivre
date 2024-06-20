@forelse($books as $book)
    <div class="card" style="border: none;">
        <div class="main-card">
            <div class="img-card">
                <a class="adaptive-img" href="{{ Route('book.show', ['book'=>$book]) }}">
                    <img class="img-book" loading="lazy" src="{{ asset('storage/books_cover/'.$book->cover) }}" alt="">
                </a>
            </div>
            <div class="description-card">
                <div class="title-card">
                    <a href="{{ Route('book.show', ['book'=>$book]) }}" style="text-decoration: none;"><p class="name-book">{{$book->title}}</p></a>
                    <a class="aftor" href="{{ Route('book.show', ['book'=>$book]) }}" style="text-decoration: none;">{{$book->writer}}</a>
                </div>
                <div class="info-card">
                    <div class="estimation-card">
                        <img class="star-book" src="/img/icons/star.svg" alt="">
                        <div class="estimation-book">{{ $book->averageRating() ? number_format($book->averageRating(), 2) : 0}}</div>
                        <div class="number-reading">(оценки: {{ $book->ratingsCount() }})</div>
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
