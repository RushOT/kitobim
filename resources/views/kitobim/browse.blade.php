@extends('kitobim.master')

@section('content')
    <!-- content -->
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link @if($item == "books") active @endif " id="v-pills-books-tab" data-toggle="pill" href="#v-pills-books" role="tab" aria-controls="v-pills-books" aria-selected="true">Books</a>
                        <a class="nav-link @if($item == "authors") active @endif " id="v-pills-authors-tab" data-toggle="pill" href="#v-pills-authors" role="tab" aria-controls="v-pills-authors" aria-selected="false">Authors</a>
                        <a class="nav-link @if($item == "genres") active @endif " id="v-pills-genres-tab" data-toggle="pill" href="#v-pills-genres" role="tab" aria-controls="v-pills-genres" aria-selected="false">Genres</a>
                        <a class="nav-link @if($item == "collections") active @endif " id="v-pills-collections-tab" data-toggle="pill" href="#v-pills-collections" role="tab" aria-controls="v-pills-collections" aria-selected="false">Collections</a>
                        <a class="nav-link @if($item == "magazines") active @endif " id="v-pills-magazines-tab" data-toggle="pill" href="#v-pills-magazines" role="tab" aria-controls="v-pills-magazines" aria-selected="false">Magazines</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade @if($item == "books") show active @endif " id="v-pills-books" role="tabpanel" aria-labelledby="v-pills-books-tab">
                        @foreach($books as $book)
                            <div class="row">
                                <div class="col-sm-3">
                                    <img class="shelfBBookImage" src="{{asset('images/placeholder.png')}}" alt="" height="170px" width="110px">
                                    <div class="mt-2">
                                        <span class="fa fa-star checked-star"></span>
                                        <span class="fa fa-star checked-star"></span>
                                        <span class="fa fa-star checked-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>  3.4/5
                                    </div>
                                    <button class="btn btn-primary">{{$book->price}} so'm</button>
                                </div>
                                <div class="col-sm-9">
                                    <h6> <span> by &nbsp</span> Author</h6>
                                    <h6>{{$book->title}}</h6>
                                    <p class="bookDesc">
                                        {{$book->annotation}}
                                    </p>
                                    <button class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to wishlist</button>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{$books->links()}}
                        {{--<div class="row">
                            <div class="col-sm-3">
                                <img class="shelfBBookImage" src="{{asset('images/snatch.jpg')}}" alt="" height="170px" width="110px">
                                <div class="mt-2">
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>  3.4/5
                                </div>
                                <button class="btn btn-primary">3000 so'm</button>
                            </div>
                            <div class="col-sm-9">
                                <h6> <span> by &nbsp</span> Ty Hutchinson</h6>
                                <h6>Contract: Snatch</h6>
                                <p class="bookDesc">
                                    Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
                                </p>
                                <button class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to wishlist</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <img class="shelfBBookImage" src="{{asset('images/cover.jpg')}}" alt="" height="170px" width="110px">
                                <div class="mt-2">
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>  3.4/5
                                </div>
                                <button class="btn btn-primary">3000 so'm</button>
                            </div>
                            <div class="col-sm-9">
                                <h6> <span> by &nbsp</span> George Martin</h6>
                                <h6>Game Of Thrones</h6>
                                <p class="bookDesc">
                                    George R.R. Martin's best-selling book series `A Song of Ice and Fire' is brought to the screen as HBO sinks its considerable storytelling teeth into the medieval fantasy epic. It's the depiction of two powerful families - kings and queens, knights and renegades, liars and honest men - playing a deadly game for control of the Seven Kingdoms of Westeros, and to sit atop the Iron Throne. Martin is credited as a co-executive producer and one of the writers for the series, which was filmed in Northern Ireland and Malta
                                </p>
                                <button class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to wishlist</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <img class="shelfBBookImage" src="{{asset('images/gone.jpg')}}" alt="" height="170px" width="110px">
                                <div class="mt-2">
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>  3.4/5
                                </div>
                                <button class="btn btn-primary">3000 so'm</button>
                            </div>
                            <div class="col-sm-9">
                                <h6> <span> by &nbsp</span> Linda Green</h6>
                                <h6>After I've Gone</h6>
                                <p class="bookDesc">
                                    Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
                                </p>
                                <button class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to wishlist</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <img class="shelfBBookImage" src="{{asset('images/harry.png')}}" alt="" height="170px" width="110px">
                                <div class="mt-2">
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star checked-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>  3.4/5
                                </div>
                                <button class="btn btn-primary">3000 so'm</button>
                            </div>
                            <div class="col-sm-9">
                                <h6> <span> by &nbsp</span> J.K.K. Rownling</h6>
                                <h6>Harry Potter and the Philosopher's stone</h6>
                                <p class="bookDesc">
                                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Nulla quis lorem ut libero malesuada feugiat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat.
                                </p>
                                <button class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to wishlist</button>
                            </div>
                        </div>
                        <hr>--}}
                    </div>
                    <div class="tab-pane fade @if($item == "authors") show active @endif " id="v-pills-authors" role="tabpanel" aria-labelledby="v-pills-authors-tab">
                        <div class="row">
                            @foreach($authors as $author)
                                <div class="col-sm-3 mt-4">
                                    <a class="bookAnchor" href="/authors/{{$author->id}}">
                                        <img class="shelfBBookImage" src="{{asset('images/aplaceholder.jpg')}}" alt="" height="200px" width="150px">
                                        <h6 class="pt-3">{{$author->name}}</h6>
                                    </a>
                                </div>
                            @endforeach
                            <div class="mt-3" >
                                {{$authors->links()}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade @if($item == "genres") show active @endif " id="v-pills-genres" role="tabpanel" aria-labelledby="v-pills-genres-tab">
                        @foreach($genres as $genre)
                            <hr>
                            <a class="bookAnchor" href="#"><h5>{{$genre->name}}</h5></a>
                            <div class="row">
                                @if($genre->books->count() == 0)
                                    &nbsp;&nbsp;&nbsp;&nbsp;No books yet Sorry :)
                                @endif
                                @foreach($genre->books as $book)
                                    <a class="bookAnchor" href="/books/{{$book->id}}">
                                        <div class="m-3">
                                            <img src="{{asset('images/placeholder_book.jpg')}}" alt="" width="100" height="150">
                                            <h6 class="bookTitle">{{$book->title}}</h6>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade @if($item == "collections") show active @endif " id="v-pills-collections" role="tabpanel" aria-labelledby="v-pills-collections-tab">
                        @foreach($collections as $collection)
                            <hr>
                            <a class="bookAnchor" href="#"><h5>{{$collection->name}}</h5></a>
                            <div class="row">
                                @if($collection->books->count() == 0)
                                    &nbsp;&nbsp;&nbsp;&nbsp;No books yet Sorry :)
                                @endif
                                @foreach($collection->books as $book)
                                    <a class="bookAnchor" href="/books/{{$book->id}}">
                                        <div class="m-3">
                                            <img src="{{asset('images/placeholder_book.jpg')}}" alt="" width="100" height="150">
                                            <h6 class="bookTitle">{{$book->title}}</h6>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade @if($item == "magazines") show active @endif " id="v-pills-magazines" role="tabpanel" aria-labelledby="v-pills-magazines-tab">
                        <div class="row">
                            @foreach($magazines as $magazine)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img class="shelfBBookImage" src="{{asset('storage/'.$magazine->cover)}}" alt="" height="225px" width="150px">
                                    </div>
                                    <div class="col-sm-9">
                                        <h6>{{$magazine->name}}</h6>
                                        <p class="bookDesc">
                                            Vivamus suscipit tortor eget felis porttitor volutpat. Nulla quis lorem ut libero malesuada feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                        </p>
                                        <button class="btn btn-outline-warning"> <i class="icon icon-book-open"></i>  READ</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection