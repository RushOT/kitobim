<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Collection;
use App\Genre;
use App\Issue;
use App\Magazine;
use Illuminate\Http\Request;
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



}