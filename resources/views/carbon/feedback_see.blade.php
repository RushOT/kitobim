@extends('carbon.base')

@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <strong>from {{$feedback->user->name}}</strong>
            <p style="float: right">{{date("F jS, Y, h:i:sa",strtotime($feedback->created_at))}}</p>
        </div>
        <div class="card-body">
            <h5>{{$feedback->theme}}</h5>
            <hr>
            <p>{{$feedback->body}}</p>
            <hr>
            <form action="/admin/feedbacks/{{$feedback->id}}" method="post">
                {{method_field("patch")}}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Your Response</label>
                    <textarea class="form-control" name="response" id="exampleFormControlTextarea1" rows="3">{{$feedback->response}}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="card-footer bg-secondary">
            <form action="/admin/feedbacks/{{$feedback->id}}" method="post" class="float-right">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
    </div>
@endsection