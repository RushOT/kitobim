@extends('carbon.base')

@section('active_dashboard')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{$usersCount}}</span>
                        <span class="font-weight-light">Total Users</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-people text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{$activeUsersCount}}</span>
                        <span class="font-weight-light">Active Users</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-user-following" style="color: #52ebbc"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">$32,400</span>
                        <span class="font-weight-light">Monthly Purchases</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-wallet" style="color: #a75d04"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">900</span>
                        <span class="font-weight-light">Book Downloads</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-cloud-download" style="color: #08a1a7"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{$booksCount}}</span>
                        <span class="font-weight-light">Books</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-book-open text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{$authorsCount}}</span>
                        <span class="font-weight-light">Authors</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-pencil" style="color: #52ebbc"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{$publishersCount}}</span>
                        <span class="font-weight-light">Publishers</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-organization" style="color: #a75d04"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <span class="h4 d-block font-weight-normal mb-2">{{$magazinesCount}}</span>
                        <span class="font-weight-light">Magazines</span>
                    </div>

                    <div class="h2 text-muted">
                        <i class="icon icon-docs" style="color: #08a1a7"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Total Users
                </div>

                <div class="card-body p-0">
                    <div class="p-4">
                        <canvas id="line-chart" width="100%" height="20"></canvas>
                    </div>

                    <div class="justify-content-around mt-4 p-4 bg-light d-flex border-top d-md-down-none">
                        <div class="text-center">
                            <div class="text-muted small">Total Traffic</div>
                            <div>12,457 Users (40%)</div>
                        </div>

                        <div class="text-center">
                            <div class="text-muted small">Banned Users</div>
                            <div>95,333 Users (5%)</div>
                        </div>

                        <div class="text-center">
                            <div class="text-muted small">Page Views</div>
                            <div>957,565 Pages (50%)</div>
                        </div>

                        <div class="text-center">
                            <div class="text-muted small">Total Downloads</div>
                            <div>957,565 Files (100 TB)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('carbon/vendor/chart.js/chart.min.js')}}"></script>
@endsection