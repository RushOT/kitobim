@extends('carbon.base')

@section('content')
    @include('carbon.errors')
    <div class="card">
        <div class="card-header bg-light">
            <strong>Edit Issue</strong>
            <form action="/admin/issues/{{$issue->id}}" method="post" class="float-right">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </div>
        <div class="card-body">
            <form action="/admin/issues/{{$issue->id}}" method="post" enctype="multipart/form-data">
                {{method_field('patch')}}
                {{csrf_field()}}
                <div class="form-group">
                    <div class="toggle-switch" data-ts-color="primary">
                        <label for="isChecked" class="ts-label">Active</label>
                        <input id="isChecked" type="checkbox" name="is_active" hidden="hidden" @if($issue->is_active == 1) checked @endif >
                        <label for="isChecked" class="ts-helper"></label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <label for="magazine-select"><strong>Select Magazine of an Issue</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select id="magazine-select" class="form-control" name="magazine_id" required>
                                @foreach($magazines as $magazine)
                                    <option value="{{$magazine->id}}" @if($magazine->id == $issue->magazine->id) selected @endif >{{$magazine->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="issueNumber">Number:</label>
                            <input class="form-control" type="number" name="number" id="issueNumber" value="{{$issue->id}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="issueDate">Published Date:</label>
                            <input class="form-control" type="date" name="date" id="issueDate" value="{{$issue->date}}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        Cover:
                        <div class="m-2"></div>
                        <img src="{{asset('storage/'.$issue->cover)}}" alt="" height="250" width="200">
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea  class="form-input" name="description" id="description">{{$issue->description}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="issueCover">Cover</label>
                    <input class="form-control" id="issueCover" type="file" name="cover" accept="image/*">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="issuePdf">Printable Document Format (PDF)</label>
                            <input class="form-control" id="issuePdf" type="file" name="pdf" accept=".pdf">
                        </div>
                    </div>
                    <div class="col-md-6 p-4">
                        <a href="/download/{{$issue->pdf}}" class="btn btn-info">
                            <i class="fa fa-download"></i> Download PDF
                        </a>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="issueEpub">ePub</label>
                            <input class="form-control" id="issueEpub" type="file" name="epub" accept=".epub">
                        </div>
                    </div>
                    <div class="col-md-6 p-4">
                        <a href="/download/{{$issue->epub}}" class="btn btn-info">
                            <i class="fa fa-download"></i> Download Epub
                        </a>
                    </div>
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
        $('#description').summernote({
            height: 200
        });
    </script>
@endsection
