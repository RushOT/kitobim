@extends('carbon.base')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/admin/notifications" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" placeholder="Title of a notification">
                </div>
                <div class="form-group">
                    <label for="content">Annotation</label>
                    <textarea  class="form-input" name="content" id="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image to append</label>
                    <input type="file" name="image" class="form-control" id="image" accept="image/*">
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
            height: 300
        });
    </script>
@endsection