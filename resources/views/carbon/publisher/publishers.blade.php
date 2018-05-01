@extends('carbon.base')

@section('active_publishers')
    active
@endsection

@section('content')

        @include('carbon.errors')
        <div class="card">
            <div class="card-header bg-light">
                <strong>All Publishers</strong>
                <button class="btn btn-primary float-right"> <i class="fa fa-download"></i>   Excel</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="publishersTable" class="table table-sm table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 50%">Name</th>
                            <th style="width: 30%">URL</th>
                            <th style="width: 10%">Books</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($publishers as $publisher)
                            <tr class="clickable-row" data-href="/admin/publishers/{{$publisher->id}}">
                                <td>{{$publisher->name}}</td>
                                <td><a class="table-link-url" href="{{$publisher->url}}">{{$publisher->url}}</a></td>
                                <td>0</td>

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

            $('#publishersTable').DataTable();

        });
    </script>
@endsection