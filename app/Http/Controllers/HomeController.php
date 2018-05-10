<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!Auth::user()->is_active){

            $message = "Please activate your account by clicking on link we sent to your email. Thank you!";

            return view('home', compact('message'));
        }

        $wishlistrow = DB::table('wishlist')->where('user_id', Auth::id())->get();

        $bids = [];

        $i = 0;

        foreach ($wishlistrow as $wr){
            $bids[$i] = $wr->book_id;
            $i++;
        }

        $books = Book::findMany($bids);
        return view('home', compact('books'));
    }
}
