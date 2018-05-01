@extends('carbon.base')

@section('active_authors')
    active
@endsection

@section('content')
    <div class="col-12 mt-4 mb-4 open">
        <div class="card">
            <div class="card-header bg-light">
                All Authors
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-sm table-bordered table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Genres</th>
                        <th>Books count</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $author)
                            <tr class="clickable-row" data-href="/admin/authors/{{$author->id}}" onclick="goToUrl()">
                                <td>{{$author->name}}</td>
                                <td>
                                    @foreach($author->genres as $genre)
                                        {{$genre->name}},
                                    @endforeach
                                </td>
                                <td>{{$author->books()->count()}}</td>
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

            $('#datatable').DataTable();
        });
    </script>
@endsection