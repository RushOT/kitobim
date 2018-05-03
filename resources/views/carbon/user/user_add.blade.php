@extends('carbon.base')

@section('active_users_add')
    active
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <strong>Add User</strong>
        </div>
        <div class="card-body">
            <form action="/admin/user" method="post">
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
                    <label for="userName">Name</label>
                    <input class="form-control" type="text" name="name" id="userName" required>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="userEmail">Email</label>
                            <input class="form-control" type="email" name="email" id="userEmail">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="userPhone">Phone Number</label>
                            <input class="form-control" type="text" name="phone" id="userPhone">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userPassword">Password</label>
                    <input class="form-control" type="text" name="password" id="userPassword" required>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="userBirth">Birth Date</label>
                            <input class="form-control" type="date" name="birth" id="userBirth">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="userCity">City</label>
                            <input class="form-control" type="text" name="city" id="userCity">
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="toggle-switch" data-ts-color="primary">
                                <label for="isAdmin" class="ts-label">Is Admin</label>
                                <input id="isAdmin" type="checkbox" name="is_admin" hidden="hidden">
                                <label for="isAdmin" class="ts-helper"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="toggle-switch" data-ts-color="primary">
                                <label for="isStaff" class="ts-label">Is Staff</label>
                                <input id="isStaff" type="checkbox" name="is_staff" hidden="hidden">
                                <label for="isStaff" class="ts-helper"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')

@endsection