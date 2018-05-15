@extends('kitobim.master')

@section('links')
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}"/>
    <script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>
@endsection

@section('active')
    active
@endsection

@section('content')
    <h2 class="pt-2" align="center">Reccomended Books</h2>
    <hr class="container">
    <div id="advert">
        <div class="container">
            <div class="slider">
                @foreach($books as $book)
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <img class="mainBookImage"
                                     @if(empty($book->cover))
                                     src="{{asset('images/placeholder.png')}}"
                                     @else
                                     src="{{asset('storage/'.$book->cover)}}"
                                     @endif
                                     height="300px" width="200px">
                            </div>
                            <div class="col-md-8">
                                <h4> <span> by &nbsp</span>
                                    @foreach($book->authors as $author)
                                        <a class="kitobimLink" href="/authors/{{$author->id}}">{{$author->name}}</a>
                                        @if(!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </h4>
                                <h6>{{$book->title}}</h6>
                                <div>
                                    @for($i = 1; $i < 6; $i++)
                                        <span class="fa fa-star @if($i <= round($book->rating)) checked-star @endif"></span>
                                    @endfor
                                </div>
                                {!! $book->annotation !!}
                                <br>
                                <a  href="/books/{{$book->id}}" class="btn btn-primary"><i class="icon icon-book-open"></i> READ</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <h4 class=" mt-4" align="center">Picks of the month</h4>
        <hr>
        <div class="row book-container">
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/gone.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> Linda Green</p>
                    <h6 align="center">After I've Gone</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/cover1.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> Guy Kawasaki</p>
                    <h6 align="center">Enchanment</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/snatch.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> Ty Hutchinson</p>
                    <h6 align="center">Contract: Snatch</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/harry.png')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> J.K.Rownling</p>
                    <h6 align="center">Harry Potter and the Philosopher's stone</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/cover.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> George R.R. Martin</p>
                    <h6 align="center">A Game of Thrones</h6>
                </a>
            </div>
        </div>
        <h4 class=" mt-4" align="center">New Releases</h4>
        <hr>
        <div class="row book-container">
            @foreach($newRels as $book)
                <div class="col">
                    <a class="bookAnchor" href="/books/{{$book->id}}">
                        <img class="shelfBookImage"
                             @if(empty($book->cover))
                             src="{{asset('images/placeholder.png')}}"
                             @else
                             src="{{asset('storage/'.$book->cover)}}"
                             @endif
                             height="225px" width="150px">
                        <p class="mt-2 mb-1" align="center"> @foreach($book->authors as $author)
                                <a class="kitobimLink" href="/authors/{{$author->id}}">{{$author->name}}</a>
                                @if(!$loop->last)
                                    ,
                                @endif
                            @endforeach</p>
                        <h6 align="center">{{$book->title}}</h6>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
                autoplay: true,
                dots: true,
            });
        });

    </script>
@endsection