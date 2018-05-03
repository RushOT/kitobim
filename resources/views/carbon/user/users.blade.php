@extends('carbon.base')

@section('active_users')
    active
@endsection


@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <strong>Users</strong>
            <button class="btn btn-primary float-right"> <i class="fa fa-download"></i>   Excel</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="usersTable" class="table table-sm table-bordered table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th style="width: 30%">Name</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 20%">Phone</th>
                        <th style="width: 10%">Active</th>
                        <th style="width: 20%">Last Login</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="clickable-row" data-href="/admin/users/{{$user->id}}">
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td class="text-center">
                                @if($user->is_active) <i class="fa fa-check-circle text-primary"></i>
                                @else  <i class="fa fa-question-circle text-secondary"></i>
                                @endif

                            </td>
                            <td>{{$user->last_login}}</td>
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

            $('#usersTable').DataTable();

        });
    </script>
@endsection