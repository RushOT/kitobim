@extends('kitobim.master')

@javascript('uid',Auth::id())

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
                                    <img class="shelfBookImageNoBorder"
                                         @if(empty($book->cover))
                                         src="{{asset('images/placeholder.png')}}"
                                         @else
                                         src="{{asset('storage/'.$book->cover)}}"
                                         @endif
                                         alt="" height="170px" width="110px">
                                    <div class="mt-2">
                                        @for($i = 1; $i < 6; $i++)
                                            <span class="fa fa-star @if($i <= round($book->rating)) checked-star @endif"></span>
                                        @endfor @if(!empty($book->rating)) {{$book->rating}} @else - @endif /5
                                    </div>
                                    <a href="/books/{{$book->id}}" class="btn btn-primary buttonToAnchor">{{$book->price}} so'm</a>
                                </div>
                                <div class="col-sm-9">
                                    <h6> <span> by &nbsp</span>
                                        @foreach($book->authors as $author)
                                            <a class="kitobimLink" href="/authors/{{$author->id}}">{{$author->name}}</a>
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </h6>
                                    <h6>{{$book->title}}</h6>
                                    <p class="bookDesc">
                                        {{$book->annotation}}
                                    </p>
                                    <button id="{{$book->id}}" class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to Wishlist</button>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{$books->links()}}
                            <div id="snackbar">Added to Wishlist</div>
                    </div>
                    <div class="tab-pane fade @if($item == "authors") show active @endif " id="v-pills-authors" role="tabpanel" aria-labelledby="v-pills-authors-tab">
                        <div class="row">
                            @foreach($authors as $author)
                                <div class="col-sm-3 mt-4">
                                    <a class="bookAnchor" href="/authors/{{$author->id}}">
                                        <img class="shelfBookImageNoBorder"
                                             @if(empty($author->photo))
                                                src="{{asset('images/aplaceholder.jpg')}}"
                                             @else
                                                src="{{asset('storage/'.$author->photo)}}"
                                             @endif
                                             alt="" height="200px" width="150px">
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
                                            <img class="shelfBookImageNoBorder" src="{{asset('images/placeholder.png')}}" alt="" width="100" height="150">
                                            <h6 class="bookTitle mt-2">{{$book->title}}</h6>
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
                                            <img src="{{asset('images/placeholder.png')}}" alt="" width="100" height="150">
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
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('carbon/js/axios.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            let wishlistButton = $('.btn.btn-outline-warning');

            wishlistButton.click(function(){

                let bid = $(this).attr('id');

                axios.post('/wishlist', {
                    book_id: parseInt(bid),
                    user_id: uid
                })
                    .then(function (response) {
                        let x = document.getElementById("snackbar");

                        // Add the "show" class to DIV
                        x.className = "show";

                        // After 3 seconds, remove the show class from DIV
                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });

        });
    </script>
@endsection