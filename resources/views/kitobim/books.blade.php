@extends('kitobim.master')

@javascript('uid',Auth::id())

@section('content')
    <!-- content -->
    <div class="container">
        <div id="snackbar">Added to Wishlist</div>
        <div class="row mt-4 mb-4">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link @if($type == "reccomended") active @endif " id="v-pills-books-tab" data-toggle="pill" href="#v-pills-books" role="tab" aria-controls="v-pills-books" aria-selected="true">Reccomended</a>
                    <a class="nav-link @if($type == "read") active @endif " id="v-pills-authors-tab" data-toggle="pill" href="#v-pills-authors" role="tab" aria-controls="v-pills-authors" aria-selected="false">Top Read</a>
                    <a class="nav-link @if($type == "free") active @endif " id="v-pills-genres-tab" data-toggle="pill" href="#v-pills-genres" role="tab" aria-controls="v-pills-genres" aria-selected="false">Top Free</a>
                    <a class="nav-link @if($type == "paid") active @endif " id="v-pills-collections-tab" data-toggle="pill" href="#v-pills-collections" role="tab" aria-controls="v-pills-collections" aria-selected="false">Top Paid</a>
                    <a class="nav-link @if($type == "new") active @endif " id="v-pills-magazines-tab" data-toggle="pill" href="#v-pills-magazines" role="tab" aria-controls="v-pills-magazines" aria-selected="false">New Release</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade @if($type == "reccomended") show active @endif " id="v-pills-books" role="tabpanel" aria-labelledby="v-pills-books-tab">
                        @foreach($reccomended as $book)
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
                                    <div class="bookDesc">
                                        {!! $book->annotation !!}
                                    </div>
                                    <button id="{{$book->id}}" class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to Wishlist</button>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="tab-pane fade @if($type == "read") show active @endif " id="v-pills-authors" role="tabpanel" aria-labelledby="v-pills-authors-tab">
                        @foreach($read as $book)
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
                                    <div class="bookDesc">
                                        {!! $book->annotation !!}
                                    </div>
                                    <button id="{{$book->id}}" class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to Wishlist</button>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="tab-pane fade @if($type == "free") show active @endif " id="v-pills-genres" role="tabpanel" aria-labelledby="v-pills-genres-tab">
                        @foreach($free as $book)
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
                                    <div class="bookDesc">
                                        {!! $book->annotation !!}
                                    </div>
                                    <button id="{{$book->id}}" class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to Wishlist</button>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="tab-pane fade @if($type == "paid") show active @endif " id="v-pills-collections" role="tabpanel" aria-labelledby="v-pills-collections-tab">
                        @foreach($paid as $book)
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
                                    <div class="bookDesc">
                                        {!! $book->annotation !!}
                                    </div>
                                    <button id="{{$book->id}}" class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to Wishlist</button>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="tab-pane fade @if($type == "new") show active @endif " id="v-pills-magazines" role="tabpanel" aria-labelledby="v-pills-magazines-tab">
                        @foreach($new as $book)
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
                                    <div class="bookDesc">
                                        {!! $book->annotation !!}
                                    </div>
                                    <button id="{{$book->id}}" class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to Wishlist</button>
                                </div>
                            </div>
                            <hr>
                        @endforeach
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