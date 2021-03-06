@extends('carbon.base')

@section('content')
    @include('carbon.errors')
    <div class="card">
        <div class="card-header bg-light">
            <strong>Edit Author</strong>
            <form class="float-right" action="/admin/authors/{{$author->id}}" method="post">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
            </form>
        </div>
        <div class="card-body">
            <form action="/admin/authors/{{$author->id}}" method="post" enctype="multipart/form-data">
                {{method_field('patch')}}
                {{csrf_field()}}
                <div class="form-group">
                    <div class="toggle-switch" data-ts-color="primary">
                        <label for="isChecked" class="ts-label">Active</label>
                        <input id="isChecked" type="checkbox" name="is_active" hidden="hidden" @if($author->is_active == 1) checked @endif >
                        <label for="isChecked" class="ts-helper"></label>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-4 col-sm-8">
                        <div class="form-group">
                            <label for="name-input" class="form-control-label">Name</label>
                            <input id="name-input" class="form-control" type="text" name="fullname"
                                   value="{{$author->name}}" required>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-8">
                        <div class="form-group">
                            <label for="date-input" class="form-control-label">Date of Birth</label>
                            <input id="date-input" class="form-control" type="date" name="birth_date" value="{{$author->birth_date}}">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-8">
                        <div class="form-group">
                            <label for="date-death-input" class="form-control-label">Date of Death</label>
                            <input id="date-death-input" class="form-control" type="date" name="death_date" value="{{$author->death_date}}">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-8 col-sm-12">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Biography</label>
                            <textarea id="description" class="form-input" name="bio">{!! $author->bio !!}</textarea>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="country-input" class="form-control-label">Country</label>
                            <input id="country-input" class="form-control" type="text" name="country"
                                   value="{{$author->country}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        @foreach($genres as $genre)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="genre[]" value="{{$genre->id}}"
                                               @if($genre->checked) checked @endif
                                        >
                                        <i style="color: rgba(0,0,129,0.82)">{{$genre->name}}</i>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="file" class="form-control-label">Photo</label>
                            <div class="img-container">
                                <img src="{{asset('storage/'.$author->photo)}}" alt="" id="image">
                                <label class="upload-button btn btn-rounded btn-primary">
                                    <input id="fileinput" type="file" accept="image/*" name="photo" onchange="readURL(this);">
                                    <i class="icon-download icon-cloud-upload"></i> Select photo
                                </label>
                            </div>
                        </div>
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }

            $("#fileinput").change(function(){
                readURL(this);
            });

        }

        $(document).ready(function() {
            $('#description').summernote({
                height: 200
            });
        });
    </script>
@endsection