@extends('carbon.base')

@section('active_pages_add')
    active
@endsection

@section('content')

    <div class="card">
        <div class="card-header bg-light">
            <strong>Add Flat Page</strong>
        </div>
        <div class="card-body">
            @include('carbon.errors')
            <form action="/admin/pages" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="require">Title</label>
                            <input id="title" class="form-control" placeholder="Page title" name="title" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url" class="form-control-label">URL</label>
                            <input type="text" id="url" name="url" class="form-control" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">Annotation</label>
                    <textarea  class="form-input" name="content" id="content" required></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('#content').summernote({
            height: 600
        });
    </script>
@endsection