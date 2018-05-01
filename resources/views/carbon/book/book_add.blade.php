@extends('carbon.base')

@section('active_books_add')
    active
@endsection

@section('content')

    @include('carbon.errors')

    <div class="card">
        <div class="card-header bg-light">
            <strong>Add Book</strong>
        </div>
        <div class="card-body">
            <form action="/admin/books" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="toggle-switch" data-ts-color="primary">
                        <label for="isChecked" class="ts-label">Active</label>
                        <input id="isChecked" type="checkbox" name="is_active" hidden="hidden" checked>
                        <label for="isChecked" class="ts-helper"></label>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <label for="title" class="require">Title</label>
                    <input id="title" class="form-control" placeholder="Book's title" name="title">
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="relatedBook"> Related Book</label>
                            <input id="relatedBook" class="form-control" placeholder="Related book's title" name="related">
                        </div>
                        <div class="related-book" id="relatedBookDiv">

                        </div>
                    </div>
                    <div class="col mt-4" id="relBookContainer">

                    </div>
                </div>

                <div class="form-group">
                    <label for="annotation">Annotation</label>
                    <textarea  class="form-input" name="annotation" id="annotation"></textarea>
                </div>

                <div class="p-4 mb-2" style="border: 1px solid lightblue">
                    <div class="row ml-1 mb-2">
                        Add Author
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group" style="margin-bottom: 0;">
                                <input id="addAuthor" type="text" class="form-control" placeholder="Search author" name="author">
                            </div>
                            <div class="list-group" id="searchResultsList">

                            </div>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-primary" href="/admin/author" target="_blank">
                                <i class="fa fa-plus" style="color: white"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="row"  id="badges-container">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 mb-2" style="border: 1px solid lightblue">
                    <strong>Collections:</strong>
                    <div class="row">
                        @foreach($collections as $collection)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="collection[]" value="{{$collection->id}}">
                                        <i style="color: rgba(0,0,129,0.82)">{{$collection->name}}</i>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="p-4 mb-2" style="border: 1px solid lightblue">
                    <div class="row ml-1 mb-2">
                        <strong class="require">Genres:</strong>
                    </div>
                    <div class="row">
                        @foreach($genres as $genre)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="genre[]" value="{{$genre->id}}">
                                        <i style="color: rgba(0,0,129,0.82)">{{$genre->name}}</i>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input id="isbn" class="form-control" placeholder="International Book Serial Number" name="isbn">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="single-select">Script</label>
                            <select id="single-select" class="form-control" name="script">
                                <option value="Latin">Latin</option>
                                <option value="Cyrillic">Cyrillic</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="year" class="form-control-label">Year</label>
                            <input type="number" id="year" class="form-control" name="year">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="publisher">Publisher</label>
                            <select id="publisher" class="form-control" name="publisher_index">
                                <option value="0">other</option>
                                @foreach($publishers as $publisher)
                                    <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="date" class="form-control-label">Published Date</label>
                        <input type="date" id="date" class="form-control" name="date">
                    </div>
                    <div class="col-md-3">
                        <label for="time" class="form-control-label">Time</label>
                        <input type="time" id="time" class="form-control" name="time">
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="input-group-2" class="require">Price</label>
                            <div class="input-group">
                                <input type="number" id="input-group-2" name="price" min="0" step="0.01" class="form-control" placeholder="Price of a book">
                                <span class="input-group-btn">
                                    <button id="freeButton" type="button" class="btn btn-secondary" > Free</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 mb-2" style="border: 1px solid lightblue">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="cover">Cover image</label>
                                <input type="file" name="cover" class="form-control" id="cover" accept="image/*">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="epub">Epub</label>
                                <input type="file" name="epub" class="form-control" id="epub" accept=".epub">
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

            let $authorInput = $('#addAuthor');

            $authorInput.on("change paste keyup", function() {

                axios.post('/authorsajax',{
                    name: $authorInput.val()
                })
                    .then(function (response) {
                        $responseList.empty();
                        let i = 0;
                        for(i = 0; i < response.data.length; i++){
                            $responseList.append("<span  class=\"list-group-item list-group-item-action anchorTagAuthor\" >"+ response.data[i].name +"</span>");
                        }

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });

            $(".list-group").on( "click","span", function(){
                $('#badges-container').append("<h5><span class=\"badge badge-info mr-1\"> <input type=\"hidden\" name=\"author[]\" value=\""  + $(this).text() + "\"> "+ $(this).text() +  "</span></h5>");
            });

            $('#badges-container').on("click", "h5", function(){
                $(this).remove();
            });

            let $relatedBD = $('#relatedBookDiv');

            let $relatedInput = $('#relatedBook');

            $relatedInput.on("change paste keyup", function(){

                axios.post('/relatedbook',{
                    title: $relatedInput.val()
                }).then(function(response){
                    $relatedBD.empty();
                    let i = 0;
                    for(i = 0; i < response.data.length; i++){
                        $relatedBD.append("<span  class=\"list-group-item list-group-item-action anchorTagAuthor\" >"+ response.data[i].title +"</span>");
                    }
                }).catch( function(error){
                    console.log(error);
                });

            });

            $(".related-book").on( "click","span", function(){
                $('#relBookContainer').empty();
                $('#relBookContainer').append("<h5><span class=\"badge badge-info mr-1\"> <input type=\"hidden\" name=\"rel_book\" value=\""  + $(this).text() + "\"> "+ $(this).text() +  "</span></h5>");
            });

            $('#relBookContainer').on("click", "h5", function(){
                $(this).remove();
            });

            $('#freeButton').click(function(){
                $('#input-group-2').val("0");
            });

            $('#annotation').summernote({
                height: 200
            });

        });
    </script>
@endsection