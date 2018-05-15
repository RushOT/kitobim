@extends('carbon.base')

@section('content')

    <div class="card">
        <div class="card-header bg-light">
            <strong>Edit Flat Page</strong>
            <form action="/admin/pages/{{$page->id}}" method="post" class="float-right">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
        <div class="card-body">
            @include('carbon.errors')
            <form action="/admin/pages/{{$page->id}}" method="post">
                {{method_field('patch')}}
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="require">Title</label>
                            <input id="title" class="form-control" name="title" value="{{$page->title}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url" class="form-control-label">URL</label>
                            <input type="text" id="url" name="url" class="form-control" value="{{$page->url}}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">Annotation</label>
                    <textarea  class="form-input" name="content" id="content" required>{{$page->content}}</textarea>
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