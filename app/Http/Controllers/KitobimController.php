<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Collection;
use App\Feedback;
use App\FlatPage;
use App\Genre;
use App\Issue;
use App\Magazine;
use App\Publisher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KitobimController extends Controller
{
    public function welcome(){
        $books = Book::where('is_pinned', true)->get();

        $newRels = Book::orderBy('created_at','desc')->take(5)->get();

        return view('kitobim.welcome',compact('books','newRels'));
    }

    public function flatpages($epoint){

        $url = "/".$epoint;

        $page = FlatPage::where('url',$url)->first();

        return view('kitobim.flatpage', compact('page'));
    }

    public function getFeedbacks(){

        $feedbacks = Feedback::all();
        return view('carbon.feedback',compact('feedbacks'));
    }

    public function getFeedback($id){

        $feedback = Feedback::find($id);
        $feedback->is_seen = true;
        $feedback->save();
        return view('carbon.feedback_see',compact('feedback'));
    }

    public function setResponse(Request $request,$id){
        $feedback = Feedback::find($id);
        $feedback->response = $request['response'];
        $feedback->is_seen = true;
        $feedback->save();
        return redirect()->to('/admin/feedbacks');
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

    public function getBooksType($type){

        $reccomended = Book::where('is_pinned',true)->get();
        $read = Book::orderBy('rating','desc')->take(25)->get();
        $free = Book::orderBy('rating','desc')->where('price',0)->take(25)->get();
        $paid = Book::orderBy('rating','desc')->where('price','>',0)->take(25)->get();
        $new = Book::orderBy('created_at','desc')->take(25)->get();

        return view('kitobim.books', compact('type','reccomended','read','free','paid','new'));
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
            DB::table('book_ratings')->where([['user_id', $request['user_id']],['book_id', $request['book_id']]])->update(['rate' => $request['point']]);
        }else{
            DB::insert('insert into book_ratings (book_id, user_id, rate) values (?, ?, ?)',[$request['book_id'],$request['user_id'],$request['point']]);
        }

        $books = DB::table('book_ratings')->where('book_id', $request['book_id'])->get();

        $sum = 0;

        foreach ($books as $book){
            $sum = $sum + $book->rate;
        }

        $avg = (float)$sum/(float)$books->count();

        $book = Book::find($request['book_id']);

        $book->rating = $avg;

        $book->update();

        return "succesfull";
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

    public function search(Request $request){
        $books = Book::where('title', 'LIKE', '%'.$request['keyword'].'%')->get();
        $booksAnnotations = Book::where('annotation', 'LIKE', '%'.$request['keyword'].'%')->get();
        $authors = Author::where('name', 'LIKE', '%'.$request['keyword'].'%')->get();

        return ['books'=> $books,
            'annotations' => $booksAnnotations,
            'authors' => $authors
        ];
    }

    public function wideSearch($keyword){

        $books = Book::where('title', 'LIKE', '%'.$keyword.'%')->get();
        $booksAnnotations = Book::where('annotation', 'LIKE', '%'.$keyword.'%')->get();
        $authors = Author::where('name', 'LIKE', '%'.$keyword.'%')->get();


        return view('kitobim.search', compact('books','authors','booksAnnotations','keyword'));
    }

    public function activateUser($code)
    {
        $user = User::where('activation_code', $code)->first();
        if (!$user){
            return "What are you doing? This not your verification code. Go and get One";
        }
        $user->is_active = true;
        $user->activation_code = null;
        $user->update();
        auth()->login($user);

        return redirect()->to('/home');
    }
}