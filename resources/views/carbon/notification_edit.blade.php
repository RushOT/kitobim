@extends('carbon.base')

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="/admin/notifications/{{$notification->id}}" method="post" class="float-right">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
        <div class="card-body">
            <form action="/admin/notifications/{{$notification->id}}" method="post" enctype="multipart/form-data">
                {{method_field("patch")}}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{$notification->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Annotation</label>
                    <textarea  class="form-input" name="content" id="content">{{$notification->content}}</textarea>
                </div>
                <div class="form-group">
                    <img src="{{asset('storage/'.$notification->img)}}" alt="" width="300" height="500">
                </div>
                <div class="form-group">
                    <label for="image">Change image to append</label>
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