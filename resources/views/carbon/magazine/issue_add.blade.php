@extends('carbon.base')
@section('content')
    @include('carbon.errors')
    <div class="card">
        <div class="card-header bg-light">
            <strong>Add Issue</strong>
        </div>
        <div class="card-body">
            <form action="/admin/issues" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-3">
                        <label for="magazine-select"><strong>Select Magazine of an Issue</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select id="magazine-select" class="form-control" name="magazine_id" required>
                                @foreach($magazines as $magazine)
                                    <option value="{{$magazine->id}}" >{{$magazine->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="issueNumber">Number:</label>
                            <input class="form-control" type="number" name="number" id="issueNumber" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="issueDate">Published Date:</label>
                            <input class="form-control" type="date" name="date" id="issueDate" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  class="form-input" name="description" id="description"></textarea>
                </div>

                <div class="form-group">
                    <label for="issueCover">Cover</label>
                    <input class="form-control" id="issueCover" type="file" name="cover" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="issuePdf">Printable Document Format (PDF)</label>
                    <input class="form-control" id="issuePdf" type="file" name="pdf" accept=".pdf">
                </div>

                <div class="form-group">
                    <label for="issueEpub">ePub</label>
                    <input class="form-control" id="issueEpub" type="file" name="epub" accept=".epub">
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