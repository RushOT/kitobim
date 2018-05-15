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

    <div class="card">
        <div class="card-header bg-light">
            <strong>Books</strong>
        </div>
        <div class="card-body">

        </div>


        <div class="card-body bg-light">
            <form action="/admin/collections/{{$collection->id}}/books" method="post">
                {{csrf_field()}}
                <div class="p-4 mb-2" style="border: 1px solid lightblue">
                    <div class="row ml-1 mb-2">
                        Add Book
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group" style="margin-bottom: 0;">
                                <input id="addBook" type="text" class="form-control" placeholder="Search book" name="book">
                            </div>
                            <div class="list-group" id="searchResultsList">

                            </div>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-primary" href="/admin/book" target="_blank">
                                <i class="fa fa-plus" style="color: white"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="row"  id="badges-container">
                                @foreach($collection->books as $book)
                                    <h4><span class="badge badge-info mr-1"> <input type="hidden" name="book[]" value="{{$book->title}}" />{{$book->title}}</span></h4>
                                @endforeach
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
    <script src="{{asset('carbon/js/axios.min.js')}}"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            let $responseList = $('#searchResultsList');

            let $authorInput = $('#addBook');

            $authorInput.on("change paste keyup", function() {

                axios.post('/booksajax',{
                    title: $authorInput.val()
                })
                    .then(function (response) {
                        $responseList.empty();
                        let i = 0;
                        for(i = 0; i < response.data.length; i++){
                            $responseList.append("<span  class=\"list-group-item list-group-item-action anchorTagAuthor\" >"+ response.data[i].title +"</span>");
                        }

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });

            $(".list-group").on( "click","span", function(){
                $('#badges-container').append("<h4><span class=\"badge badge-info mr-1\"> <input type=\"hidden\" name=\"book[]\" value=\""  + $(this).text() + "\"> "+ $(this).text() +  "</span></h4>");
            });

            $('#badges-container').on("click", "h4", function(){
                $(this).remove();
            });
        });
    </script>
@endsection