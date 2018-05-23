<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Collection;
use App\Feedback;
use App\Genre;
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\BooksCollection;
use App\Http\Resources\BooksResource;
use App\Http\Resources\CollectCollection;
use App\Http\Resources\GenreCollection;
use App\Http\Resources\PublisherCollection;
use App\Http\Resources\PublisherResource;
use App\Http\Resources\SimpleAuthorResource;
use App\Http\Resources\SimpleBookResource;
use App\Notifications\UserRegisteredSuccessfully;
use App\Publisher;
use App\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class APIsController extends Controller
{

    public $successStatus = 200;

    public function getBook($id){
        return new BooksResource(Book::find($id));
    }

    public function getBooks(){
        return new BooksCollection(Book::paginate());
    }

    public function getFreeBooks(){
        return new BooksCollection(Book::where('price',0)->paginate());
    }

    public function getRecommended(){
        return new BooksCollection(Book::where('is_pinned',1)->paginate());
    }

    public function getNewBooks(){
        return new BooksCollection(Book::orderBy('created_at','desc')->take(25)->get());
    }


    public function getAuthor($id){
        return new AuthorResource(Author::find($id));
    }

    public function getAllAuthors(){
        return new AuthorCollection(Author::paginate());
    }

    public function getBooksOfAuthor($id){
        return new BooksCollection(Author::find($id)->books);
    }

    public function getGenres(){
        return new GenreCollection(Genre::paginate());
    }

    public function getBooksOfGenre($id){
        return new BooksCollection(Genre::find($id)->books);
    }

    public function getCollections(){
        return new CollectCollection(Collection::paginate());
    }

    public function getBooksOfCollection($id){
        return new BooksCollection(Collection::find($id)->books);
    }

    public function getPublishers(){
        return new PublisherCollection(Publisher::all());
    }

    public function getPublisher($id){
        return new BooksCollection(Publisher::find($id)->books);
    }

    public function getFeedbacks($id){
        $fbacks = Feedback::where('user_id',$id)->get();

        return ['data' => $fbacks];
    }

    public function createFeedback(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'body' => 'required',
            'subject' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $feedback = new Feedback();
        $feedback->user_id = $id;
        $feedback->body = $request['body'];
        $feedback->theme  = $request['subject'];
        $feedback->response = "";
        $feedback->is_seen = 0;
        $feedback->is_active = 0;
        $feedback->save();

        return response()->json(null,201);
    }



    public function downloadBook($id){

        $book = Book::find($id);

        return Storage::download($book->epub);
    }


    public function getWishlist($id){

        return  [ 'data' => $wishlistrow = DB::table('wishlist')->where('user_id',$id)->get()];
    }

    public function addToWishlist(Request $request,$id){

        if (DB::table('wishlist')->where([
            ['user_id', $id],['book_id',$request['book_id']]
        ])->exists()) {
            return response()->json(['fail' => 'already exists']);
        }else{
            DB::insert('insert into wishlist (book_id, user_id) values (?, ?)',[$request['book_id'],$id]);
            return response()->json(['success' => 'successfully added', 'data' => $wishlistrow = DB::table('wishlist')->where('user_id',$id)->get()]);
        }
    }

    public function removeFromWishlist($id, $book){

        if (DB::table('wishlist')->where([
            ['user_id', $id],['book_id', $book]
        ])->exists()) {
            DB::table('wishlist')->where([['user_id', $id],['book_id', $book]])->delete();
            return response()->json(null,204);
        }
    }
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $user->last_login = now();
            $user->save();
            $success['token'] =  $user->createToken('kitobim')-> accessToken;
            return response()->json($success);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['last_login'] = now();
        $user = User::create($input);
        $success['token'] =  $user->createToken('kitobim')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }
}