@extends('layouts.index')

@section('title', $book->title)
@section('description', $book->description)
@section('styles')
    <link rel="stylesheet" href="/css/pages/product.css">
@endsection
@section('content')
<div class="book_id" style="display: none">{{ $book->id }}</div>
<div class="product">
  <div class="flex-product">
    <div class="product-left">
      <div class="product-wrraper-img">
        <div class="product-img-big-wrraper">
          <div class="product-img-big">
            <img class="img-big" src="/storage/books_cover/{{$book->cover}}" alt="">
          </div>
        </div>
        <div class="product-img-small-wrraper1">
          <div class="product-img-small-wrraper2">
              <img class="product-img-small" src="/storage/books_cover/{{$book->cover}}" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="product-center">
      <div class="product-center-up">
        <div class="product-center-up-flex">
          <div class="product-center-up-wrraper">
            <div class="up-up-yellow">
                  <div class="up-up-wrraper">
                      <svg viewBox="0 0 16 17" fill="none" width="16" height="16">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.032 4.308a.085.085 0 01-.064 0l-4.31-1.723a1.188 1.188 0 00-.44-.085C2.544 2.5 2 3.06 2 3.752v7.377c0 .7.418 1.329 1.053 1.582l4.033 1.613c.588.235 1.24.235 1.828 0l4.033-1.613A1.698 1.698 0 0014 11.13V3.752c0-.155-.028-.31-.083-.454a1.207 1.207 0 00-1.576-.713l-4.31 1.723zm-4.466 6.82V4.275l3.836 1.533a1.61 1.61 0 001.198 0l3.836-1.533v6.853a.09.09 0 01-.056.084l-4.032 1.612a.933.933 0 01-.694 0l-4.032-1.612a.09.09 0 01-.056-.084z" fill="#000">
                          </path>
                      </svg>
                  </div>
                  <span>Читаю</span>
              </div>
          </div>
          <div class="up1">
            <div class="up1-flex">
              <div class="up1-left">
                <svg viewBox="0 0 16 16" fill="#000" width="24" height="24">
                  <path d="M11.587 2.429c0 .833.012 1.667-.007 2.5-.007.282.082.348.338.339.535-.02 1.07-.006 1.654-.006-.33.648-.725 1.258-1.178 1.821-.864 1.109-1.85 2.096-2.863 3.056a5.688 5.688 0 01-.818.625c-.34.219-.585.159-.813-.182a5.533 5.533 0 01-.335-.599c-.08-.16-.14-.218-.303-.067a18.07 18.07 0 00-1.928 2.066 2.688 2.688 0 00-.594 1.59c-.394-.623-.744-1.162-1.08-1.709-.375-.62-.737-1.244-1.115-1.858a.666.666 0 01-.055-.655c.167-.4.363-.79.652-1.111.69-.761 1.373-1.53 2.16-2.191.368-.31.798-.502 1.291-.498a.708.708 0 01.645.364c.51.813 1.021 1.625 1.545 2.43.244.375.368.752.152 1.205a.595.595 0 00.31-.656 1.54 1.54 0 00-.217-.533c-.366-.607-.724-1.22-1.093-1.821-.093-.152-.119-.252.034-.394 1.258-1.167 2.477-2.375 3.618-3.716z" fill="#B5CB50">
                  </path>
                </svg>
                <p class="p-up1">Бесплатно</p>
              </div>
              <div class="right-flex">
                <div class="right-left-flex">
                  <svg class="up1-star" viewBox="0 0 16 16" width="16" height="16" fill="black">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z">
                    </path>
                  </svg>
                  <div class="up1-enable">
                    <b class="b-up1">{{ $averageRating ? number_format($averageRating, 2) : 'Оценок пока нет' }}</b>
                  </div>
                </div>
                <div class="right1-flex">
                  <p class="right1-flex_total">(оценки: {{ $ratingsCount }})</p>
                </div>
              </div>
            </div>
          </div>
          <div class="title-up2">
            <div class="title-up2-wrraper">
              <h1 class="h1-title-up2">{{ $book->title }}</h1>
            </div>
          </div>
          <div class="aftor-up3">
            <div class="aftor-up3-wrraper">
              <a class="a-aftor-up3" href="">{{ $book->author }}</a>
            </div>
          </div>
          <div class="information-book-up4">
            <p class="inf-p-up4 p-inf">{{ $book->page_count }} печатных страниц</p>
            <p class="inf-p-up4 p-inf">Время чтения ≈ {{ date('H:i', strtotime($book->reading_time)) }}</p>
            <p class="inf-p-up4 p-inf">{{ $book->year_of_publication }} год</p>
            <p class="inf-p-up4 p-inf">{{ $book->age_restriction }}+</p>
          </div>
        </div>
      </div>
      <div class="wrraper-btn-read-product">
          <div class="wrraper-btn-read-product-flex1">
              <div class="btn1-read">
                  @auth
                      <a class="a1-btn1-read1 a1-btn1-read1-a1" href="{{ route('book.read', compact('book')) }}"><span>Читать онлайн</span></a>
                  @else
                      <a class="a1-btn1-read1 a1-btn1-read1-a1" href="{{ route('login') }}"><span>Читать онлайн</span></a>
                  @endauth
              </div>
              <div class="btn2-read">
                  <div class="dropdown">
                      <button class="btn3-fdsa aaa1" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                          <div class="aaa2">
                              <div class="aaa3">
                                  <svg viewBox="0 0 16 16" fill="#000" width="24" height="24">
                                      <path clip-rule="evenodd" d="M8 6.667a1.333 1.333 0 110 2.666 1.333 1.333 0 010-2.666zm-5.333 0a1.333 1.333 0 110 2.666 1.333 1.333 0 010-2.666zm10.666 0a1.333 1.333 0 110 2.666 1.333 1.333 0 010-2.666z">
                                      </path>
                                  </svg>
                              </div>
                          </div>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                          <li><a class="dropdown-item" href="{{ route('book.download', $book->id) }}">Скачать в формате ePub &nbsp &nbsp <i class="fi fi-rr-download" style="margin-left: 12px;"></i></a></li>
                          <li><a class="dropdown-item" href="{{ route('library.store', $book->id) }}">Добавить книгу на полку &nbsp &nbsp<i class="fi fi-rr-plus"></i></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <div class="wrraper-star-product1">
          <div class="wrraper3-star-product1">
              <div class="wrraper3-1-text">
                  Оцените книгу
              </div>
              <ul class="wrapper3-2-star-product1 rating" data-book-id="{{ $book->id }}">
                  @for($i = 1; $i <= 5; $i++)
                  <li class="ant-star1" id="star" data-value="{{ $i }}">
                      <div class="ant-rate-star-first" data-value="{{ $i }}">
                      </div>
                  </li>
                  @endfor
              </ul>
          </div>
      </div>
      <div class="wrraper-product-down">
        <div class="wrraper1-product-down">
          <div class="wrraper2-product-down">
            <div class="wrraper2-1">
              <div class="wrraper2-1-1">
                <div class="wrraper2-1-1-0">
                  О книге
                </div>
              </div>
            </div>
            <div class="wrraper2-2">
              <div id="fools" class="wrraper2-2-1 fools">
                <p class="wrraper2-2-1-0">{{ $book->description }}</p>
                <div class="wrraper2-2-2">
                  <div class="wrraper2-2-2-0">
                    <div class="wrapper-2-2-2-0-1">
                      <a class="a-wrraper-2-2-2-0-1" href="">
                        <div class="wrapper-2-2-2-0-1-1">
                          <div class="icon-wrapper-2-2-2-2-0-1-1">
                            <svg viewBox="0 0 16 16" fill="#b34d00" fill-rule="evenodd" width="16" height="16">
                              <path clip-rule="evenodd" d="M8.032 3.808a.085.085 0 01-.064 0l-4.31-1.723A1.188 1.188 0 003.219 2C2.544 2 2 2.56 2 3.252v7.377c0 .7.418 1.329 1.053 1.582l4.033 1.613c.588.235 1.24.235 1.828 0l4.033-1.613A1.698 1.698 0 0014 10.63V3.252c0-.155-.028-.31-.083-.454a1.207 1.207 0 00-1.576-.713l-4.31 1.723zm-4.466 6.82V3.775l3.836 1.533a1.61 1.61 0 001.198 0l3.836-1.533v6.853a.09.09 0 01-.056.084l-4.032 1.612a.933.933 0 01-.694 0l-4.032-1.612a.09.09 0 01-.056-.084z">
                              </path>
                            </svg>
                          </div>
                          <div class="pustoy-mesto">
                          </div>
                          <div class="wrapper2-2-2-2-0-1-1-1">
                            Читать отрывок
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="wrapper-2-2-2-0-2">
                      <div class="wrapper2-2-2-0-2-1">
                        <div class="wrapper2-2-2-0-2-1--">
                          Подробная информация
                        </div>
                      </div>
                      <div class="wrapper2-2-2-0-2-2">
                        <div class="wrapper2-2-2-0-2-2-1">
                          <dl class="dl-wrapper1">
                            <dt class="dt-wrapper1">
                              Дата написания:
                            </dt>
                            <dd class="dd-wrapper1">
                                {{ $book->date_of_writing }}
                            </dd>
                          </dl>
                          <dl class="dl-wrapper1">
                            <dt class="dt-wrapper1">
                              Объем:
                            </dt>
                            <dd class="dd-wrapper1">
                                {{ $book->volume }}
                            </dd>
                          </dl>
                          <dl class="dl-wrapper1">
                            <dt class="dt-wrapper1">
                              Год издания:
                            </dt>
                            <dd class="dd-wrapper1">
                                {{ $book->year_of_publication }}
                            </dd>
                          </dl>
                        </div>
                        <div class="wrapper2-2-2-0-2-2-2">
                          <dl class="dl-wrapper1">
                            <dt class="dt-wrapper1">
                              ISBN (EAN):
                            </dt>
                            <dd class="dd-wrapper1">
                                {{ $book->isbn }}
                            </dd>
                          </dl>
                          <dl class="dl-wrapper1">
                            <dt class="dt-wrapper1">
                              Переводчик:
                            </dt>
                            <dd class="dd-wrapper1">
                                {{ $book->interpreter }}
                            </dd>
                          </dl>
                          <dl class="dl-wrapper1">
                            <dt class="dt-wrapper1">
                              Время на чтение:
                            </dt>
                            <dd class="dd-wrapper1">
                                {{ date('H:i', strtotime($book->reading_time)) }}
                            </dd>
                          </dl>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="wrraper2-3">
            </div>
            <div class="wrraper2-4">
              <div id="foo" class="wrraper-2-4-1">
                <div class="wrraper-2-4-1-1">
                  <svg id="svg-up-suc" class="wrraper2-4-1-1-icon" viewBox="0 0 16 16" fill="#000" width="16" height="16">
                    <path clip-rule="evenodd" d="M10.124 9.158l1.2-1.168-5.752-5.73a.893.893 0 00-1.26 1.264l4.45 4.451-4.5 4.501a.893.893 0 001.261 1.264l4.6-4.582z">
                    </path>
                  </svg>
                </div>
                <button class="wrraper-2-4-1-2">
                  <span id="span-open" class="span-wrraper-2-4-1-2 span-open">Показать полностью</span>
                  <span id="span-closed" class="span-closed">Скрыть</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
    <script src="/js/pages/product.js"></script>
@endsection
