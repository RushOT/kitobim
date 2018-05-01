<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carbon - Admin Template</title>
    <link rel="stylesheet" href="{{asset('carbon/vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('carbon/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('carbon/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('carbon/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('carbon/css/mystyle.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="{{asset('carbon/css/datatable.css')}}"/>
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand" href="#">
            <strong class="text-center">Kitobim</strong>
        </a>

        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
            </li>

            <li class="nav-item d-md-down-none">
                <a href="/admin/feedbacks">
                    <i class="fa fa-envelope-open"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('carbon/imgs/placeholder.png')}}" class="avatar avatar-sm" alt="logo">
                    <span class="small ml-1 d-md-down-none">Adminstrator</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header">Account</div>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-user"></i> Profile
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope"></i> Messages
                    </a>

                    <div class="dropdown-header">Settings</div>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-bell"></i> Notifications
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-wrench"></i> Settings
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-lock"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">

                    <li class="nav-item">
                        <a href="/admin" class="nav-link @yield('active_dashboard')">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-title">Kitobim</li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link @yield('active_authors') @yield('active_authors_add') nav-dropdown-toggle">
                            <i class="icon icon-pencil "></i> Authors <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/authors" class="nav-link @yield('active_authors')">
                                    <i class="icon icon-list"></i> All
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/author" class="nav-link @yield('active_authors_add')">
                                    <i class="icon icon-plus"></i> Add
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link @yield('active_books') @yield('active_books_add') nav-dropdown-toggle">
                            <i class="icon icon-book-open"></i> Books <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/books" class="nav-link @yield('active_books')">
                                    <i class="icon icon-list"></i> All
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/book" class="nav-link @yield('active_books_add')">
                                    <i class="icon icon-plus"></i> Add
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/genres" class="nav-link @yield('active_genres')">
                            <i class="icon icon-puzzle"></i> Genres
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/collections" class="nav-link @yield('active_collections')">
                            <i class="icon icon-bag"></i> Collections
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link @yield('active_publishers') @yield('active_publishers_add') nav-dropdown-toggle">
                            <i class="icon icon-organization"></i> Publishers <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/publishers" class="nav-link @yield('active_publishers')">
                                    <i class="icon icon-list"></i> All
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/publisher" class="nav-link @yield('active_publishers_add')">
                                    <i class="icon icon-plus"></i> Add
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="/admin/users" class="nav-link @yield('active_users')">
                            <i class="icon icon-people"></i> Users
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-docs"></i> Magazines <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/magazines" class="nav-link">
                                    <i class="icon icon-plus"></i>Add Magazine
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/issues" class="nav-link">
                                    <i class="icon icon-layers"></i> Issues
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/issue" class="nav-link">
                                    <i class="icon icon-event"></i>Add Issue
                                </a>
                            </li>

                        </ul>
                    </li>



                    <li class="nav-title">More</li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-umbrella"></i> Pages <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="blank.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Blank Page
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="login.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Login
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="register.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Register
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="invoice.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Invoice
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="404.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> 404
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="500.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> 500
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="settings.html" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Settings
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{asset('carbon/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('carbon/vendor/popper.js/popper.min.js')}}"></script>
<script src="{{asset('carbon/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('carbon/vendor/chart.js/chart.min.js')}}"></script>
<script src="{{asset('carbon/js/carbon.js')}}"></script>
<script src="{{asset('carbon/js/demo.js')}}"></script>
<script src="{{asset('carbon/js/datatable.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js">
</script>
<script src="{{asset('carbon/summernote/summernote-bs4.js')}}"></script>
@yield('script')
</body>
</html>
