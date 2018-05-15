@extends('kitobim.master')

@javascript('key', $keyword)

@section('content')
    <div class="container mt-4">
        @if(!empty($books))
            <h5>In Books</h5>
            <hr>
        <div class="row">
            @foreach($books as $book)
                <a class="bookAnchor" href="/books/{{$book->id}}">
                    <div class="m-3">
                        <img class="shelfBookImageNoBorder"
                             @if(empty($book->cover))
                             src="{{asset('images/placeholder.png')}}"
                             @else
                             src="{{asset('storage/'.$book->cover)}}"
                             @endif
                             alt="" width="150" height="200">
                        <h6 class="bookTitle mt-2 notAllText">{{$book->title}}</h6>
                    </div>
                </a>
            @endforeach
        </div>
        @endif

        @if(!empty($booksAnnotations))
            <h5>In Book Annotations</h5>
            <hr>
                <div class="row">
                    @foreach($booksAnnotations as $book)
                        <div class="col-sm-3">
                            <a class="bookAnchor" href="/books/{{$book->id}}">
                                <h6>{{$book->title}}</h6>
                            </a>
                        </div>
                        <div class="col-sm-8 mb-4">
                            <i class="notAllText">
                                {!! $book->annotation !!}
                            </i>
                        </div>
                    @endforeach
                </div>
        @endif

        @if(!empty($authors))
            <h5>In Authors</h5>
            <hr>
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
                                     alt="" height="225px" width="150px">
                                <h6 class="pt-3 notAllText">{{$author->name}}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
        @endif
    </div>
@endsection

@section('script')
    <script src="{{asset('js/jquery.highlight-5.js')}}"></script>
    <script type="text/javascript">
        $('.notAllText').highlight(key);
    </script>
@endsection