<?php

namespace App\Http\Controllers;

use App\FlatPage;
use Illuminate\Http\Request;

class PagesController extends Controller
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
        $pages = FlatPage::all();

        return view('carbon.page.flatpages', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carbon.page.flatpage_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'title' => 'required',
           'url' => 'required',
           'content' => 'required'
        ]);

        $page = new FlatPage();
        $page->title = $request['title'];
        $page->url = $request['url'];
        $page->content = $request['content'];

        $page->save();

        return redirect()->to('/admin/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = FlatPage::find($id);

        return view('carbon.page.flatpage_edit',compact('page'));
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
        $this->validate($request,[
            'title' => 'required',
            'url' => 'required',
            'content' => 'required'
        ]);

        $page = FlatPage::find($id);
        $page->title = $request['title'];
        $page->url = $request['url'];
        $page->content = $request['content'];

        $page->update();

        return redirect()->to('/admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = FlatPage::find($id);
        $page->delete();

        return redirect()->to('/admin/pages');
    }
}
