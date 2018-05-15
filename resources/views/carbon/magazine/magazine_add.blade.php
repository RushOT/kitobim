@extends('carbon.base')

@section('content')
    @include('carbon.errors')
    <div class="card">
        <div class="card-header bg-light">
            <strong>Add Magazine</strong>
        </div>
        <div class="card-body">
            <form action="/admin/magazines" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name of a magazine">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="foundedDate">Founded Date</label>
                            <input class="form-control" type="date" id="foundedDate" name="founded">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="issn">ISSN</label>
                    <input class="form-control" type="text" id="issn" name="issn" placeholder="ISSN of a magazine">
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">Description</label>
                    <textarea id="description" class="form-input" name="description"></textarea>
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

    <div class="card">
        <div class="card-header">
            <strong>All Magazines</strong>
        </div>
        <div class="card-body">
            <table id="magazinesTable" class="table table-sm table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Issues</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($magazines as $magazine)
                        <tr class="clickable-row" data-href="/admin/magazines/{{$magazine->id}}">
                            <td>{{$magazine->name}}</td>
                            <td>{{$magazine->issues()->count()}}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#description').summernote({
                height: 200
            });

            $('.clickable-row').click(function(){
                window.location = $(this).data("href");
            });

            $('#magazinesTable').DataTable();
        });
    </script>
@endsection