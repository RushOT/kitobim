<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
</head>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('carbon/vendor/simple-line-icons/css/simple-line-icons.css')}}">

    <link rel="stylesheet" href="{{asset('css/kitobim.css')}}">
{{--    <link href="{{asset('gretong/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('links')
</head>
<body>

<div class="main-content">
    @yield('content')
    <div class="footer">
        <div class="container">
            <div class="row pt-4">
                <div class="col">
                    <h6>Kitobim</h6>
                    <a class="footerLinks" href="#">Sayt haqida</a> <br>
                    <a class="footerLinks" href="#">Foydalanish shartlari</a> <br>
                    <a class="footerLinks" href="#">Ko'p beriladigan savollar</a> <br>
                </div>
                <div class="col">
                    <h6>Yordam</h6>
                    <a class="footerLinks" href="#">Servisdan foydalanish</a> <br>
                    <a class="footerLinks" href="#">Kitobim dasturi</a> <br>
                    <a class="footerLinks" href="#">Kitoblarni turli qurilmalarda o'qish</a> <br>
                    <a class="footerLinks" href="#">Yangi kitoblar uchun so'rovlar</a> <br>
                </div>
                <div class="col">
                    <h6>Hamkorlik</h6>
                    <a class="footerLinks" href="#">Nashriyotlar va mustqail mualliflar uchun</a> <br>
                    <a class="footerLinks" href="#">Reklama</a> <br>
                </div>
                <div class="col">
                    <h6>Kitobim</h6> © 2012—2018.
                    <p id="suggestionsText" class="mb-2">Takliflar, talablar va hamkorlik bo‘yicha quyidagi pochtaga maktub yozing:</p>
                    <a href="#">info@kitobim.com</a>
                    <div class="row pl-2">
                        <a class="m-1" href="https://www.facebook.com/Kitobim"><img src="{{asset('images/facebook.png')}}" alt="" width="32px"></a>
                        <a class="m-1" href="https://twitter.com/kitobimcom"><img src="{{asset('images/twitter.png')}}" alt="" width="32px"></a>
                        <a class="m-1" href="https://www.instagram.com/kitobim.uz/"><img src="{{asset('images/instagram.png')}}" alt="" width="32px"></a>
                        <a class="m-1" href="http://vk.com/public45369710"><img src="{{asset('images/vkontakte.png')}}" alt="" width="32px"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" alt="" width="127px" height="30px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Books</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Read
                        </a>
                        <div class="dropdown-menu pt-2" aria-labelledby="navbarDropdown" id="bigDropdown">
                            <div class="row">
                                <div class="col-4" id="leftOfRand">
                                    <a class="dropdown-item" href="#">Recommended</a>
                                    <a class="dropdown-item" href="#">Top Read</a>
                                    <a class="dropdown-item" href="#">Top Free</a>
                                    <a class="dropdown-item" href="#">Top Paid</a>
                                    <a class="dropdown-item" href="#">New Release</a>
                                </div>
                                <div class="col-8" id="random-book-container">
                                    <p id="titleOfRandomBook">The most read book this week</p>
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{asset('images/cover.jpg')}}" alt="" height="150px" width="100px">
                                        </div>
                                        <div class="col-8">
                                            <h6>Game Of Thrones</h6>
                                            <p id="authorNameBy">by George Martin</p>
                                            <div>
                                                <span class="fa fa-star checked-star"></span>
                                                <span class="fa fa-star checked-star"></span>
                                                <span class="fa fa-star checked-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <p>
                                                George R.R. Martin's best-selling book series
                                                `A Song of Ice and Fire' is brought to the screen as HBO sinks its
                                                considerable storytelling teeth into the medieval fantasy epic. It's the depiction
                                                of two powerful families - kings and queens,
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Browse
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="row">
                                <a class="dropdown-item" href="/browse/books">Books</a>
                                <a class="dropdown-item" href="/browse/authors">Authors</a>
                                <a class="dropdown-item" href="/browse/genres">Genres</a>
                                <a class="dropdown-item" href="/browse/collections">Collections</a>
                                <a class="dropdown-item" href="/browse/magazines">Magazines</a>
                            </div>
                        </div>
                    </li>
                    @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" id="login" href="{{route('login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register" href="{{route('register')}}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="row">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Authors</a>
                                    <a class="dropdown-item" href="#">Genres</a>
                                    <a class="dropdown-item" href="#">Collections</a>
                                    <hr>
                                    <a class="dropdown-item" href="#">Log Out</a>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="icon icon-magnifier"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>

@yield('script')
</body>
</html>
