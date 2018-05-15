@extends('carbon.base')

@section('active_books')
    active
@endsection

@section('content')

    @include('carbon.errors')
    <div class="card">
        <div class="card-header bg-light">
            <strong>All Books</strong>
            <button class="btn btn-primary float-right"> <i class="fa fa-download"></i>   Excel</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="booksTable" class="table table-sm table-bordered table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th style="width: 30%">Title</th>
                        <th style="width: 35%">Authors</th>
                        <th style="width: 10%">Price</th>
                        <th style="width: 5%">Pin</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr class="clickable-row" data-href="/admin/books/{{$book->id}}">
                                <td>{{$book->title}}</td>
                                <td>
                                    @if(!empty($book->authors))
                                        @foreach ($book->authors as $author)
                                            {{$author->name}} ,
                                        @endforeach </td>
                                    @endif
                                <td>{{$book->price}}</td>
                                <td>{{$book->is_pinned}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('.clickable-row').click(function(){
                window.location = $(this).data("href");
            });

            $('#booksTable').DataTable();
        });
    </script>
@endsection