@extends('carbon.base')

@section('active_genres')
    active
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <strong>All Genres</strong>
        </div>
        <div class="card-body">
            <table id="genresTable" class="table table-sm table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Books</th>
                    <th>Authors</th>
                </tr>
                </thead>
                <tbody>
                @foreach($genres as $genre)
                    <tr class="clickable-row" data-href="/admin/genres/{{$genre->id}}">
                        <td>{{$genre->name}}</td>
                        <td>{{$genre->books()->count()}}</td>
                        <td>{{$genre->authors()->count()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-light">
            <strong>Add Genre</strong>
        </div>
        <div class="card-body" id="addGenreForm">
            <form action="/admin/genres" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name-input" class="form-control-label">Name</label>
                    <input id="name-input" class="form-control" type="text" name="name"
                           placeholder="Name of a Genre">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('.clickable-row').click(function(){
                window.location = $(this).data("href");
            });

            $('#genresTable').DataTable();
        });
    </script>
@endsection
