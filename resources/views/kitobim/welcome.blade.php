@extends('kitobim.master')

@section('content')
    <div class="arriv">
        <div class="container">
            <div class="arriv-top">
                <div class="col-md-6 arriv-left">

                    <div class="image-container">
                        <div class="layer-on-image"></div>
                        <img src="{{asset('gretong/images/fiction.jpg')}}" class="img-responsive" alt="">

                    </div>

                    <div class="arriv-info">
                        <h3>&emsp;FANTASTIKA</h3>
                        <p>&emsp;&emsp;LITERATURE IN THE FORM OF PROSE</p>
                        <div class="crt-btn">
                            <a href="details.html">READ</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 arriv-right">
                    <div class="image-container">
                        <div class="layer-on-image"></div>
                        <img src="{{asset('gretong/images/non_fiction.jpg')}}" class="img-responsive" alt="">
                    </div>

                    <div class="arriv-info">
                        <h3>BADIIY</h3>
                        <p>PROSE WRITING THAT IS INFORMATIVE OR FACTUAL</p>
                        <div class="crt-btn">
                            <a href="details.html">READ</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="arriv-bottm">
                <div class="col-md-8 arriv-left1">

                    <img src="{{asset('gretong/images/3.jpg')}}" class="img-responsive" alt="">
                    <div class="arriv-info1">
                        <h3>BOLALAR UCHUN</h3>
                        <p>REVIVE YOUR WARDROBE WITH CHIC KNITS</p>
                        <div class="crt-btn">
                            <a href="details.html">READ</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 arriv-right1">
                    <img src="{{asset('gretong/images/4.jpg')}}" class="img-responsive" alt="">
                    <div class="arriv-info2">
                        <a href="details.html"><h3>Sayohat<i class="ars"></i></h3></a>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="arriv-las">
                <div class="col-md-4 arriv-left2">
                    <img src="{{asset('gretong/images/5.jpg')}}" class="img-responsive" alt="">
                    <div class="arriv-info2">
                        <a href="details.html"><h3>Klassika<i class="ars"></i></h3></a>
                    </div>
                </div>
                <div class="col-md-4 arriv-middle">
                    <img src="{{asset('gretong/images/6.jpg')}}" class="img-responsive" alt="">
                    <div class="arriv-info3">
                        <h3>SHE'RIYAT</h3>
                        <div class="crt-btn">
                            <a href="details.html">READ</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 arriv-right2">
                    <img src="{{asset('gretong/images/7.jpg')}}" class="img-responsive" alt="">
                    <div class="arriv-info2">
                        <a href="details.html"><h3>Abituriyentlar uchun<i class="ars"></i></h3></a>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="special">
        <div class="container">
            <h3>TOP REYTING</h3>
            <div class="specia-top">
                <ul class="grid_2">
                    <li>
                        <a href="details.html"><img src="{{asset('gretong/images/8.jpg')}}" class="img-responsive" alt=""></a>
                        <div class="special-info grid_1 simpleCart_shelfItem">
                            <h5>Lorem ipsum dolor</h5>
                            <div class="item_add"><span class="item_price"><h6>ONLY $40.00</h6></span></div>
                            <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                        </div>
                    </li>
                    <li>
                        <a href="details.html"><img src="{{asset('gretong/images/9.jpg')}}" class="img-responsive" alt=""></a>
                        <div class="special-info grid_1 simpleCart_shelfItem">
                            <h5>Consectetur adipis</h5>
                            <div class="item_add"><span class="item_price"><h6>ONLY $60.00</h6></span></div>
                            <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                        </div>
                    </li>
                    <li>
                        <a href="details.html"><img src="{{asset('gretong/images/10.jpg')}}" class="img-responsive" alt=""></a>
                        <div class="special-info grid_1 simpleCart_shelfItem">
                            <h5>Commodo consequat</h5>
                            <div class="item_add"><span class="item_price"><h6>ONLY $14.00</h6></span></div>
                            <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                        </div>
                    </li>
                    <li>
                        <a href="details.html"><img src="{{asset('gretong/images/11.jpg')}}" class="img-responsive" alt=""></a>
                        <div class="special-info grid_1 simpleCart_shelfItem">
                            <h5>Voluptate velit</h5>
                            <div class="item_add"><span class="item_price"><h6>ONLY $37.00</h6></span></div>
                            <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                        </div>
                    </li>
                    <div class="clearfix"> </div>
                </ul>
            </div>
        </div>
    </div>
@endsection