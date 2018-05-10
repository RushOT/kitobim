@extends('kitobim.master')

@section('links')
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}"/>
    <script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>
@endsection

@section('active')
    active
@endsection

@section('content')
    <h2 class="pt-2" align="center">Reccomended Books</h2>
    <hr class="container">
    <div id="advert">
        <div class="container">
            <div class="slider">
                <div>
                    <div class="row">
                        <div class="col-md-4">
                            <img class="mainBookImage" src="{{asset('images/cover.jpg')}}" alt="" height="300px" width="200px">
                        </div>
                        <div class="col-md-8">
                            <h4> <span> by &nbsp</span> George Martin</h4>
                            <h6>Game Of Thrones</h6>
                            <div>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star checked-star"></span>
                            </div>
                            <p>
                                George R.R. Martin's best-selling book series `A Song of Ice and Fire' is brought to the screen as HBO sinks its considerable storytelling teeth into the medieval fantasy epic. It's the depiction of two powerful families - kings and queens, knights and renegades, liars and honest men - playing a deadly game for control of the Seven Kingdoms of Westeros, and to sit atop the Iron Throne. Martin is credited as a co-executive producer and one of the writers for the series, which was filmed in Northern Ireland and Malta
                            </p>
                            <button class="btn btn-primary"><i class="icon icon-book-open"></i> READ</button>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-4">
                            <img class="mainBookImage" src="{{asset('images/harry.png')}}" alt="" height="300px" width="200px">
                        </div>
                        <div class="col-md-8">
                            <h4> <span> by &nbsp</span> J K. Rowling</h4>
                            <h6>Harry Potter and the Philosopher's stone</h6>
                            <div>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star "></span>
                            </div>
                            <p>
                                Harry Potter and the Philosopher's Stone is a fantasy novel written by British author J. K. Rowling. It is the first novel in the Harry Potter series and Rowling's debut novel, first published in 1997 by Bloomsbury. It was published in the United States as Harry Potter and the Sorcerer's Stone by Scholastic Corporation in 1998. The plot follows Harry Potter, a young wizard who discovers his magical heritage as he makes close friends and a few enemies in his first year at the Hogwarts School of Witchcraft and Wizardry.                            </p>
                            <button class="btn btn-primary box"><i class="icon icon-book-open"></i> READ</button>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-4">
                            <img class="mainBookImage" src="{{asset('images/snatch.jpg')}}" alt="" height="300px" width="200px">
                        </div>
                        <div class="col-md-8">
                            <h4> <span> by &nbsp</span> Ty Hutchinson</h4>
                            <h6>Contract: Snatch</h6>
                            <div>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star checked-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p>
                                Sei abandoned her life as an assassin to try to find peace—but when contacted by a source claiming to have information about the daughter she thought she’d lost, Sei finds herself taking on one last mission. Can she unravel the truth before time runs out?                            </p>
                            <button class="btn btn-primary box"><i class="icon icon-book-open"></i> READ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h4 class=" mt-4" align="center">Picks of the week</h4>
        <hr>
        <div class="row book-container">
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/gone.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> Linda Green</p>
                    <h6 align="center">After I've Gone</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/cover1.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> Guy Kawasaki</p>
                    <h6 align="center">Enchanment</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/snatch.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> Ty Hutchinson</p>
                    <h6 align="center">Contract: Snatch</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/harry.png')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> J.K.Rownling</p>
                    <h6 align="center">Harry Potter and the Philosopher's stone</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/cover.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> George R.R. Martin</p>
                    <h6 align="center">A Game of Thrones</h6>
                </a>
            </div>
        </div>
        <h4 class=" mt-4" align="center">New Releases</h4>
        <hr>
        <div class="row book-container">
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/gone.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> Linda Green</p>
                    <h6 align="center">After I've Gone</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/cover1.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> Guy Kawasaki</p>
                    <h6 align="center">Enchanment</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/snatch.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> Ty Hutchinson</p>
                    <h6 align="center">Contract: Snatch</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/harry.png')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> J.K.Rownling</p>
                    <h6 align="center">Harry Potter and the Philosopher's stone</h6>
                </a>
            </div>
            <div class="col">
                <a class="bookAnchor" href="">
                    <img class="shelfBookImage" src="{{asset('images/cover.jpg')}}" alt="" height="225px" width="150px">
                    <p class="mt-2 mb-1" align="center"> George R.R. Martin</p>
                    <h6 align="center">A Game of Thrones</h6>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
                autoplay: true,
                dots: true,
            });
        });

    </script>
@endsection