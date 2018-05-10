@extends('kitobim.master')

@section('content')
    <div class="container">
        <hr>
        <h3>Publishers</h3>
        <hr>
        <div class="row">
            @foreach($publishers as $publisher)
                <a class="kitobimLink m-2" href="/publishers/{{$publisher->id}}">
                    <img class="shelfBookImageNoBorder"
                         @if(empty($publisher->logo))
                         src="{{asset('images/publ_placeholder.png')}}"
                         @else
                         src="{{asset('storage/'.$publisher->logo)}}"
                         @endif
                         alt="" width="200" height="200">
                    <div style="width: 200px;">
                        <h6 class="mt-2">{{$publisher->name}}</h6>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection