<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Collection;
use App\Genre;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('carbon.book.books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = Publisher::all();
        $collections = Collection::orderBy('name','asc')->get();
        $genres = Genre::orderBy('name','asc')->get();
        $authors = Author::all();
        return view('carbon.book.book_add', compact('publishers','collections', 'genres','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'epub' => 'mimes:epub',
            'genre' => 'required',
        ]);

        $book = new Book();
        $book->title = $request['title'];
        $book->annotation = $request['annotation'];
        $book->price = $request['price'];
        $book->isbn = $request['isbn'];
        $book->year = $request['year'];
        $book->publisher_id = $request['publisher_index'];
        $book->published_date = $request['date'];
        $book->published_time = $request['time'];
        if ($request['is_active'] == 'on'){
            $book->is_active = true;
        }else{
            $book->is_active = false;
        }

        if (!empty($request['rel_book'])){
            $relatedBook = Book::where('title', $request['rel_book'])->first();
            $book->related_book_id = $relatedBook->id;
        }

        $book->script = $request['script'];
        if (!empty($request['cover'])){
            $book->cover = $request->file('cover')->store('covers','public');
        }
        if (!empty($request['epub'])){
            $book->epub = $request->file('epub')->store('books');
        }
        $book->save();

        $collections = $request['collection'];

        if (!empty($collections)){
            foreach ($collections as $collection){
                $book->collections()->attach($collection);
            }
        }

        $genres = $request['genre'];

        foreach ($genres as $genre){
            $book->genres()->attach($genre);
        }

        $authors = $request['author'];

        if (!empty($authors)){
            foreach ($authors as $author){
                $a = Author::where('name', $author)->first();
                $book->authors()->attach($a->id);
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $publishers = Publisher::all();
        $collections = Collection::orderBy('name','asc')->get();
        $genres = Genre::orderBy('name','asc')->get();

        foreach ($book->genres as $myGenre){
            foreach ($genres as $genre){
                if (!strcmp($myGenre->name, $genre->name)){
                    $genre->checked = true;
                }
            }
        }

        foreach ($book->collections as $coln){
            foreach ($collections as $collection){
                if (!strcmp($coln->name, $collection->name)){
                    $collection->checked = true;
                }
            }
        }

        $relBook = Book::where('id', $book->related_book_id)->first();

        return view('carbon.book.book_edit', compact('book','publishers','collections','genres','relBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'epub' => 'mimes:epub',
            'genre' => 'required',
        ]);

        $book = Book::find($id);
        $book->title = $request['title'];
        $book->annotation = $request['annotation'];
        $book->price = $request['price'];
        $book->isbn = $request['isbn'];
        $book->year = $request['year'];
        $book->publisher_id = $request['publisher_index'];
        $book->published_date = $request['date'];
        $book->published_time = $request['time'];
        if ($request['is_active'] == 'on'){
            $book->is_active = true;
        }else{
            $book->is_active = false;
        }
        $book->script = $request['script'];
        if (!empty($request['cover'])){
            if (!empty($book->cover)){
                Storage::delete('public/'.$book->cover);
            }
            $book->cover = $request->file('cover')->store('covers','public');
        }
        if (!empty($request['epub'])) {
            if (!empty($book->epub)){
                Storage::delete($book->epub);
            }
            $book->epub = $request->file('epub')->store('books');
        }

        if (!empty($request['rel_book'])){
            $relatedBook = Book::where('title', $request['rel_book'])->first();
            $book->related_book_id = $relatedBook->id;
        }

        $book->update();

        $collections = $request['collection'];

        $book->collections()->detach();

        if (!empty($collections)){
            foreach ($collections as $collection){
                $book->collections()->attach($collection);
            }
        }

        $genres = $request['genre'];

        $book->genres()->detach();

        foreach ($genres as $genre){
            $book->genres()->attach($genre);
        }

        $authors = $request['author'];

        $book->authors()->detach();

        if (!empty($authors)){
            foreach ($authors as $author){
                $a = Author::where('name', $author)->first();
                $book->authors()->attach($a->id);
            }
        }

        return redirect('/admin/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        Storage::delete('public/'.$book->cover);
        Storage::delete($book->epub);
        $book->delete();

        return redirect('/admin/books');
    }

    public function getRelatedBook(Request $request){

        if ($request['title'] == ""){
            return "";
        }

        $books = Book::where('title', 'LIKE', '%'.$request['title'].'%')->get();

        return $books;

    }
}
