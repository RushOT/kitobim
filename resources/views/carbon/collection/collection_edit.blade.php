@extends('carbon.base')

@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <strong>Edit</strong>
            <form action="/admin/collections/{{$collection->id}}" method="post" class="float-right">
                {{method_field('delete')}}
                {{csrf_field()}}
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
        <div class="card-body">
            <form action="/admin/collections/{{$collection->id}}" method="post">
                {{method_field('PATCH')}}
                {{csrf_field()}}
                <div class="form-group">
                    <div class="toggle-switch" data-ts-color="primary">
                        <label for="isChecked" class="ts-label">Active</label>
                        <input id="isChecked" type="checkbox" name="is_active" hidden="hidden" @if($collection->is_active == 1) checked @endif >
                        <label for="isChecked" class="ts-helper"></label>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="name-input" class="form-control-label">Name</label>
                    <input id="name-input" class="form-control" type="text" name="name" value="{{$collection->name}}">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection