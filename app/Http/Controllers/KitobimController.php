<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Collection;
use App\Genre;
use App\Issue;
use App\Magazine;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KitobimController extends Controller
{
    public function getFeedbacks(){

        return view('carbon.feedback');
    }

    public function downloadBook($filename){

        $book = Book::where('epub',"books/".$filename)->first();

        return Storage::download($book->epub);
    }

    public function downloadPdf($filename){
        $issue = Issue::where('pdf',"issuespdf/".$filename)->first();

        return Storage::download($issue->pdf);
    }

    public function downloadEpub($filename){
        $issue = Issue::where('epub',"issuesepub/".$filename)->first();

        return Storage::download($issue->epub);
    }

    public function browse($item){

        $books = Book::paginate(10);
        $authors = Author::paginate(12);
        $genres = Genre::with('books')->get();
        $collections = Collection::with('books')->get();;
        $magazines = Magazine::all();


        return view('kitobim.browse', compact('item','books','authors','genres','collections','magazines'));
    }

    public function book($id){

        $book = Book::find($id);

        $relatedBook = Book::find($book->related_book_id);

        $rate = DB::table('book_ratings')->where([['user_id',Auth::id()],['book_id', $id]])->get()->first();

        if (empty($rate)){
            $rating = 0;
            return view('kitobim.book',compact('book','rating','relatedBook'));
        }

        $rating = $rate->rate;

        return view('kitobim.book',compact('book','rating','relatedBook'));
    }

    public function getAuthor($id){
        $author = Author::find($id);

        return view('kitobim.author', compact('author'));
    }

    public function rateBook(Request $request){

        if (DB::table('book_ratings')->where([
            ['user_id', $request['user_id']],['book_id',$request['book_id']]
        ])->exists()){
            return DB::table('book_ratings')->where([['user_id', $request['user_id']],['book_id', $request['book_id']]])->update(['rate' => $request['point']]);
        }else{
            return DB::insert('insert into book_ratings (book_id, user_id, rate) values (?, ?, ?)',[$request['book_id'],$request['user_id'],$request['point']]);
        }

    }

    public function addToWishlist(Request $request){

        if (DB::table('wishlist')->where([
            ['user_id', $request['user_id']],['book_id',$request['book_id']]
        ])->exists()) {

        }else{
            DB::insert('insert into wishlist (book_id, user_id) values (?, ?)',[$request['book_id'],$request['user_id']]);
        }
    }

    public function removeFromWishlist(Request $request){

        $bid = (int)$request['book_id'];
        $uid = $request['user_id'];

        if (DB::table('wishlist')->where([
            ['user_id', $uid],['book_id', $bid]
        ])->exists()) {
            DB::table('wishlist')->where([['user_id', $uid],['book_id', $bid]])->delete();
        }

    }

    public function getPublishers(){
        $publishers = Publisher::with('books')->orderBy('name','asc')->get();

        return view('kitobim.publishers', compact('publishers'));
    }

    public function getPublisher($id){
        $publisher = Publisher::find($id);

        return view('kitobim.publisher',compact('publisher'));
    }
}