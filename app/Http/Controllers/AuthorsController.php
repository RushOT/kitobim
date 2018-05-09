<?php

namespace App\Http\Controllers;

use App\Author;
use App\Genre;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authors = Author::with('genres')->get();
        return view('carbon.author.authors',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $genres = Genre::orderBy('name','asc')->get();
        return view('carbon.author.author_add', compact('genres'));
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
            'fullname' => 'required',
        ]);

        $author = new Author();
        $author->name = $request['fullname'];
        $author->birth_date = $request['birth_date'];
        $author->death_date = $request['death_date'];
        $author->country = $request['country'];
        $author->bio = $request['bio'];
        if (!empty($request['photo'])){
            $author->photo = $request->file('photo')->store('authors','public');
        }

        if ($request['is_active'] == 'on'){
            $author->is_active = true;
        }else{
            $author->is_active = false;
        }

        $author->save();

        $genres = $request['genre'];

        foreach ($genres as $genre){
            $author->genres()->attach($genre);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);

        $genres = Genre::all();

        foreach ($author->genres as $myGenre){
            foreach ($genres as $genre){
                if (!strcmp($myGenre->name, $genre->name)){
                    $genre->checked = true;
                }
            }
        }

        return view('carbon.author.author_edit', compact('author','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $author->name = $request['fullname'];
        $author->birth_date = $request['birth_date'];
        $author->death_date = $request['death_date'];
        $author->country = $request['country'];
        $author->bio = $request['bio'];

        $genres = $request['genre'];

        if ($request['is_active'] == 'on'){
            $author->is_active = true;
        }else{
            $author->is_active = false;
        }

        $author->genres()->detach();

        if (!empty($genres)){
            foreach ($genres as $genre){
                $author->genres()->attach($genre);
            }
        }

        if (!empty($request['photo'])){
            if (!empty($author->photo)){
                Storage::delete('public/'.$author->photo);
            }
            $author->photo = $request->file('photo')->store('authors','public');
        }

        $author->update();

        return redirect('/admin/authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        if (!empty($author->photo)){
            Storage::delete('public/'.$author->photo);
        }
        $author->genres()->detach();

        $author->delete();
        return redirect('/admin/authors');
    }

    public function getAuthorsForSearch(Request $request){

        if ($request['name'] == ""){
            return "";
        }

        $authors = Author::where('name', 'LIKE', '%'.$request['name'].'%')->get();

        return $authors;
    }
}
