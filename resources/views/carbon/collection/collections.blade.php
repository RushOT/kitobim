@extends('carbon.base')

@section('active_collections')
    active
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <strong>All Collections</strong>
        </div>
        <div class="card-body">
            <table id="collectionsTable" class="table table-sm table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Books</th>
                </tr>
                </thead>
                <tbody>
                @foreach($collections as $collection)
                    <tr class="clickable-row" data-href="/admin/collections/{{$collection->id}}">
                        <td>{{$collection->name}}</td>
                        <td>5</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-light">
            <strong>Add Collection</strong>
        </div>
        <div class="card-body">
            <form action="/admin/collections" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name-input" class="form-control-label">Name</label>
                    <input id="name-input" class="form-control" type="text" name="name"
                           placeholder="Name of a collection">
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

            $('#collectionsTable').DataTable();

        });
    </script>
@endsection
