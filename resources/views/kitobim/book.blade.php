@extends('kitobim.master')

@javascript('bid', $book->id)

@if(Auth::check())
    @javascript('uid', Auth::user()->id)
@endif
@section('content')
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-sm-3">
                <img class="shelfBookImageNoBorder"
                     @if(empty($book->cover))
                     src="{{asset('images/placeholder.png')}}"
                     @else
                     src="{{asset('storage/'.$book->cover)}}"
                     @endif
                     alt="" width="200px" height="300px">
                @if(Auth::check())
                    @if($rating == 0)
                        <div id="ratinCon" class="mt-3">
                            <span id="1Star" class="fa fa-star for-rating"></span>
                            <span id="2Star" class="fa fa-star for-rating"></span>
                            <span id="3Star" class="fa fa-star for-rating"></span>
                            <span id="4Star" class="fa fa-star for-rating"></span>
                            <span id="5Star" class="fa fa-star for-rating"></span>
                            <br><span id="rateThis">Rate this book</span>
                        </div>
                    @else
                        <div id="ratinCon" class="mt-3">
                            @for($i=1; $i < 6; $i++)
                                <span id="{{$i}}Star" class="fa fa-star for-rating @if($i <= $rating) checked-star @endif "></span>
                            @endfor
                            <br><span id="rateThis">Rate this book</span>
                        </div>
                    @endif
                @endif
            </div>
            <div class="col-sm-9">
                <div class="row mt-3 ml-1">
                    <h3>{{$book->title}}</h3>
                    <div class="row m-2">
                        @for($i = 1; $i < 6; $i++)
                            <span class="fa fa-star @if($i <= round($book->rating)) checked-star @endif"></span>
                        @endfor
                        <h6 class="ml-1"><span>avg</span> @if(!empty($book->rating)) {{$book->rating}} @else - @endif /5</h6>
                    </div>
                </div>
                <h6><span>Authors:</span>
                    @foreach($book->authors as $author)
                        <a class="kitobimLink" href="/authors/{{$author->id}}">{{$author->name}}</a>
                        @if(!$loop->last)
                            ,
                        @endif
                    @endforeach
                </h6>
                @if(!empty($book->publisher))
                    <h6><span>Publisher</span>: <a class="kitobimLink" href="/publishers/{{$book->publisher_id}}">{{$book->publisher->name}}</a> </h6>
                @endif

                <h6><span>Year:</span> {{$book->year}}</h6>
                <h6><span>ISBN:</span> {{$book->isbn}} </h6>
                <hr>
                <p>
                    {!! $book->annotation !!}
                </p>
                <a href="/books/{{$book->id}}" class="btn btn-primary buttonToAnchor">{{$book->price}} so'm</a>
                <button id="addToWishlist" class="btn btn-outline-warning"><i class="icon icon-heart"></i>  Add to Wishlist</button>
            </div>
        </div>
        @if(!empty($relatedBook))
            <hr>
            <a class="bookAnchor" href="/books/{{$relatedBook->id}}">
                <div class="m-3">
                    <img class="shelfBookImageNoBorder"
                         @if(empty($relatedBook->cover))
                         src="{{asset('images/placeholder.png')}}"
                         @else
                         src="{{asset('storage/'.$relatedBook->cover)}}"
                            @endif
                         alt="" width="100" height="150">
                    <h6 class="bookTitle mt-2">{{$relatedBook->title}}</h6>
                </div>
            </a>
        @endif
        <div id="snackbar">You rated this book</div>
    </div>
@endsection

@section('script')
    <script src="{{asset('carbon/js/axios.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            let ratingElement = $('.for-rating');

            ratingElement.mouseover(function(){

               $(this).addClass(' checked-star');
               $(this).prevAll().addClass(' checked-star');
                $(this).nextAll().removeClass(' checked-star');

            });

            ratingElement.click(function(){

                let rate;

                if($(this).attr('id') === "1Star"){
                    rate = 1;
                }else if($(this).attr('id') === "2Star"){
                    rate = 2;
                }else if($(this).attr('id') === "3Star"){
                    rate = 3;
                }else if($(this).attr('id') === "4Star"){
                    rate = 4;
                }else if($(this).attr('id') === "5Star"){
                    rate = 5;
                }

                axios.post('/ratebook', {
                    book_id: bid,
                    user_id: uid,
                    point: rate
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

            let wishlistButton = $('#addToWishlist');

            wishlistButton.click(function(){
                axios.post('/wishlist', {
                    book_id: bid,
                    user_id: uid
                })
                    .then(function (response) {
                        let x = document.getElementById("snackbar");

                        x.innerHTML = "Added to wishlist";
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

