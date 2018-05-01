@extends('carbon.base')

@section('active_publishers')
    active
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <strong>Edit Publisher</strong>
            <form action="/admin/publishers/{{$publisher->id}}" method="post" class="float-right">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
        <div class="card-body">
            <form action="/admin/publishers/{{$publisher->id}}" method="post" enctype="multipart/form-data">
                {{method_field('PATCH')}}
                {{csrf_field()}}
                <div class="form-group">
                    <div class="toggle-switch" data-ts-color="primary">
                        <label for="isChecked" class="ts-label">Active</label>
                        <input id="isChecked" type="checkbox" name="is_active" hidden="hidden" @if($publisher->is_active == 1) checked @endif >
                        <label for="isChecked" class="ts-helper"></label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="require">Name</label>
                                    <input id="name" class="form-control" value="{{$publisher->name}}" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="url" class="form-control-label">URL</label>
                                    <input type="url" id="url" name="url" class="form-control" value="{{$publisher->url}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea  class="form-control" name="description" id="description" rows="5">{{$publisher->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        Logo
                        <div class="m-2"></div>
                        <img src="{{asset('storage/'.$publisher->logo)}}" alt="" width="225" height="250">
                    </div>
                </div>
                <div class="form-group">
                    <label for="logoPub">Logo image</label>
                    <input type="file" name="logo" class="form-control" id="logoPub" accept="image/*">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection