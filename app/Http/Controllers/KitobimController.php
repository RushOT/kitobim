<?php

namespace App\Http\Controllers;

use App\Book;
use App\Issue;
use Illuminate\Http\Request;
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

    public function allBooks(){
        $books = Book::all();

        return view('kitobim.books', compact('books'));
    }


}