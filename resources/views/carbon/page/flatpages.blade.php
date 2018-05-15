@extends('carbon.base')

@section('active_pages')
    active
@endsection

@section('content')

    @include('carbon.errors')
    <div class="card">
        <div class="card-header bg-light">
            <strong>All Flat Pages</strong>
            <button class="btn btn-primary float-right"> <i class="fa fa-download"></i>   Excel</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="pagesTable" class="table table-sm table-bordered table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th style="width: 30%">URL</th>
                        <th style="width: 50%">Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr class="clickable-row" data-href="/admin/pages/{{$page->id}}">
                            <td><a class="table-link-url" href="{{env('APP_URL')}}/kitobim{{$page->url}}">{{$page->url}}</a></td>
                            <td>{{$page->title}}</td>
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

            $('#pagesTable').DataTable();

        });
    </script>
@endsection