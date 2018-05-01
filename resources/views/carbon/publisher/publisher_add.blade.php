@extends('carbon.base')

@section('active_publishers_add')
    active
@endsection

@section('content')

    <div class="card">
        <div class="card-header bg-light">
            <strong>Add Publisher</strong>
        </div>
        <div class="card-body">
            @include('carbon.errors')
            <form action="/admin/publishers" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="toggle-switch" data-ts-color="primary">
                        <label for="isChecked" class="ts-label">Active</label>
                        <input id="isChecked" type="checkbox" name="is_active" hidden="hidden">
                        <label for="isChecked" class="ts-helper"></label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="require">Name</label>
                            <input id="name" class="form-control" placeholder="Publisher's name" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url" class="form-control-label">URL</label>
                            <input type="url" id="url" name="url" class="form-control" value="http://">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  class="form-control" name="description" id="description" rows="5"></textarea>
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