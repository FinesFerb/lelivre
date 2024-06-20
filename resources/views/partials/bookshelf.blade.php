@forelse($books as $book)
    <div class="card" style="border: none;">
        <div class="category">
            <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" style="border: none; background: none;" >
                    <img src="/img/icons/more.svg" alt="" style="width: 40px;">
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li>
                        <form id="delete-form" action="{{ route('library.destroy', $book->id) }}" method="get">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-trash"></i>
                                Удалить
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="label-category" style="display: none">
                <h1 style="font-size: revert;">{{$book->category}}</h1>
            </div>
        </div>
        <div class="main-card">
            <div class="img-card">
                <a class="adaptive-img" href="{{ route('book.show', ['book'=>$book]) }}">
                    <img class="img-book" src="/storage/books_cover/{{ $book->cover }}" alt="">
                </a>
            </div>
            <div class="description-card">
                <div class="title-card">
                    <a href="{{ route('book.show', ['book'=>$book]) }}" style="text-decoration: none;"><p class="name-book">{{$book->title}}</p></a>
                    <a class="aftor" href="{{ route('book.show', ['book'=>$book]) }}" style="text-decoration: none;">{{$book->writer}}</a>
                </div>
                <div class="info-card">
                    <div class="read-card-icon">
                        <img src="/img/icons/listen.svg" alt="">
                    </div>
                    <div class="estimation-card">
                        <img class="star-book" src="/img/icons/star.svg" alt="">
                        <div class="estimation-book"></div>
                        <div class="number-reading"></div>
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
