@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Books</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(!Auth::user()->is_active)
                            {{$message}}
                        @else
                            @foreach($books as $book)
                                <div>
                                    <div class="row pt-4 pb-4">
                                        <div class="col-sm-3">
                                            <img class="shelfBookImageNoBorder"
                                                 @if(empty($book->cover))
                                                 src="{{asset('images/placeholder.png')}}"
                                                 @else
                                                 src="{{asset('storage/'.$book->cover)}}"
                                                 @endif
                                                 height="170px" width="110px">
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
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{asset('carbon/js/axios.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>
@endsection
