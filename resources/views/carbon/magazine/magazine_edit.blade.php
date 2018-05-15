@extends('carbon.base')

@section('content')
    @include('carbon.errors')

    <div class="card">
        <div class="card-header bg-light">
            <strong>{{$magazine->name}}</strong>
            <button class="btn btn-primary float-right"> <i class="fa fa-download"></i>   Excel</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="issuesTable" class="table table-sm table-bordered table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th style="width: 50%">Number</th>
                        <th style="width: 30%">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($issues as $issue)
                        <tr class="clickable-row" data-href="/admin/issues/{{$issue->id}}">
                            <td>{{$issue->number}}</td>
                            <td>{{$issue->date}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-light">
            <strong>Edit Magazine</strong>
            <form action="/admin/magazines/{{$magazine->id}}" method="post" class="float-right">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
        <div class="card-body">
            <form action="/admin/magazines/{{$magazine->id}}" method="post" enctype="multipart/form-data">
                {{method_field('patch')}}
                {{csrf_field()}}

                <div class="form-group">
                    <div class="toggle-switch" data-ts-color="primary">
                        <label for="isChecked" class="ts-label">Active</label>
                        <input id="isChecked" type="checkbox" name="is_active" hidden="hidden" @if($magazine->is_active == 1) checked @endif >
                        <label for="isChecked" class="ts-helper"></label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" id="name" name="name" value="{{$magazine->name}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="foundedDate">Founded Date</label>
                            <input class="form-control" type="date" id="foundedDate" name="founded" value="{{$magazine->founded}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="issn">ISSN</label>
                    <input class="form-control" type="text" id="issn" name="issn" value="{{$magazine->issn}}">
                </div>
                <div class="row">
                    <div class="col-md-3">
                        Cover:
                        <div class="m-2"></div>
                        <img src="{{asset('storage/'.$magazine->cover)}}" alt="" width="200" height="250">
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea id="description" class="form-input" name="description">{{$magazine->description}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="coverImage">Cover Image</label>
                    <input type="file" name="cover" id="coverImage" class="form-control" accept="image/*">
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
        $(document).ready(function(){
            $('#description').summernote({
                height: 200
            });

            $('.clickable-row').click(function(){
                window.location = $(this).data("href");
            });

            $('#issuesTable').DataTable();
        });
    </script>
@endsection