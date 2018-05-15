@extends('kitobim.master')

@section('content')
    <div class="container">
        <div class="row">
            <h1 >{{$page->title}}</h1>
        </div>
        <div class="row">
            {!! $page->content !!}
        </div>
    </div>
@endsection