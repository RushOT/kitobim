@extends('kitobim.master')

@section('content')
    <div class="container">
        <hr>
        <h3 >{{$publisher->name}}</h3>
        <hr>
        <div class="row mb-4">
            <div class="col-sm-4">
                <img class="shelfBookImageNoBorder"
                     @if(empty($publisher->logo))
                     src="{{asset('images/publ_placeholder.png')}}"
                     @else
                     src="{{asset('storage/'.$publisher->logo)}}"
                     @endif
                     alt="" id="image" width="300px" height="300px">
            </div>
            <div class="col-sm-8">
                <h6><span>URL: </span> <a href="{{$publisher->url}}">{{$publisher->url}}</a> </h6>
                <p>
                    {!! $publisher->description !!}
                </p>
            </div>
        </div>
        <hr>
        <h4 >Books</h4>
        <hr>
        <div class="row mb-3">
            @if($publisher->books->count() == 0)
                &nbsp;&nbsp;&nbsp;&nbsp;No books yet Sorry :)
            @endif
            @foreach($publisher->books as $book)
                <a class="bookAnchor" href="/books/{{$book->id}}">
                    <div class="m-3">
                        <img class="shelfBookImageNoBorder"
                             @if(empty($book->cover))
                             src="{{asset('images/placeholder.png')}}"
                             @else
                             src="{{asset('storage/'.$book->cover)}}"
                             @endif
                             alt="" width="100" height="150">
                        <h6 class="bookTitle mt-2">{{$book->title}}</h6>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection