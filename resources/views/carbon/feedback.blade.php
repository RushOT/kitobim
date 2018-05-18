@extends('carbon.base')

@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <strong>Feedback</strong>
            <button class="btn btn-primary float-right"> <i class="fa fa-download"></i>   Excel</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="feedbackTable" class="table table-sm table-bordered table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th style="width: 15%">Subject</th>
                        <th style="width: 45%">Content</th>
                        <th style="width: 10%">user</th>
                        <th style="width: 20%">Time</th>
                        <th style="width: 20%">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedbacks as $feedback)
                        <tr class="clickable-row" data-href="/admin/feedbacks/{{$feedback->id}}">
                            <td>{{$feedback->theme}}</td>
                            <td>{{$feedback->body}}</td>
                            <td>{{$feedback->user->name}}</td>
                            <td>{{date("F jS, Y, h:i:sa",strtotime($feedback->created_at))}}</td>
                            <td>
                            @if(!$feedback->is_seen) <span class="badge badge-danger">new</span>
                            @else
                            @endif
                            @if(!empty($feedback->response)) <span class="badge badge-primary">answered</span>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('.clickable-row').click(function(){
                window.location = $(this).data("href");
            });

            $('#feedbackTable').DataTable({
                "order": [[ 4, "desc" ]]
            });

        });
    </script>
@endsection