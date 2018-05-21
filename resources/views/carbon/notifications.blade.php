@extends('carbon.base')

@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <a href="/admin/notifications/create" class="btn btn-warning">Send Notification</a>
            <button class="btn btn-primary float-right"> <i class="fa fa-download"></i>   Excel</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="notificationTable" class="table table-sm table-bordered table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th style="width: 70%">Title</th>
                        <th style="width: 30%">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notifications as $notification)
                        <tr class="clickable-row" data-href="/admin/notifications/{{$notification->id}}">
                            <td>{{$notification->title}}</td>
                            <td>{{date("F jS, Y, h:i:sa",strtotime($notification->created_at))}}</td>
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

            $('#notificationTable').DataTable({
                "order": [[ 1, "desc" ]]
            });

        });
    </script>
@endsection