@extends('kitobim.master')

@section('content')
    <div class="container">
        <hr>
        <h3 >{{$author->name}}</h3>
        <hr>
        <div class="row mb-4">
            <div class="col-sm-3">
                <img class="mainBookImageNoBorder"
                     @if(empty($author->photo))
                     src="{{asset('images/aplaceholder.jpg')}}"
                     @else
                     src="{{asset('storage/'.$author->photo)}}"
                     @endif
                     alt="" id="image" width="200px" height="300px">
            </div>
            <div class="col-sm-9">
                <h6><span>country: </span> {{$author->country}} </h6>
                <h6><i>{{date("F jS, Y",strtotime($author->birth_date))}}</i> - <i>
                    @if(!empty($author->death_date))
                        {{date("F jS, Y",strtotime($author->death_date))}}
                    @endif
                    </i></h6>
                <p>
                    {!! $author->bio !!}
                </p>
            </div>
        </div>
        <hr>
        <h4 >Books</h4>
        <hr>
        <div class="row">
            @if($author->books->count() == 0)
                &nbsp;&nbsp;&nbsp;&nbsp;No books yet Sorry :)
            @endif
            @foreach($author->books as $book)
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