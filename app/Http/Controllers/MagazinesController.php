<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Magazine;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MagazinesController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $magazines = Magazine::all();
        $publishers = Publisher::all();

        return view('carbon.magazine.magazine_add', compact('magazines', 'publishers'));
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
            'name' => 'required',
        ]);

        $magazine = new Magazine();
        $magazine->name = $request['name'];
        $magazine->description = $request['description'];
        $magazine->founded = $request['founded'];
        $magazine->is_active = true;

        if (!empty($request['cover'])){
            $magazine->cover = $request->file('cover')->store('magazines','public');
        }

        $magazine->publisher_id = $request['publisher_id'];

        $magazine->save();

        $magazines = Magazine::all();
        $publishers = Publisher::all();

        return view('carbon.magazine.magazine_add', compact('magazines','publishers'));
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
        $magazine = Magazine::find($id);
        $publishers = Publisher::all();

        $issues = $magazine->issues;

        return view('carbon.magazine.magazine_edit', compact('magazine','issues','publishers'));
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
        $magazine = Magazine::find($id);

        $magazine->name = $request['name'];
        $magazine->founded = $request['founded'];
        $magazine->description = $request['description'];
        $magazine->publisher_id = $request['publisher_id'];

        if ($request['is_active'] == 'on'){
            $magazine->is_active = true;
        }else{
            $magazine->is_active = false;
        }

        if (!empty($request['cover'])){
            if (!empty($magazine->cover)){
                Storage::delete('public/'.$magazine->cover);
            }
            $magazine->cover = $request->file('cover')->store('magazines','public');
        }

        $magazine->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magazine = Magazine::find($id);

        if (!empty($magazine->cover)){
            Storage::delete('public/'.$magazine->cover);
        }

        $magazine->delete();

        return redirect('/admin/magazines');
    }

    public function createIssue(){
        $magazines = Magazine::all();
        return view('carbon.magazine.issue_add',compact('magazines'));
    }

    public function allIssues(){

        $issues = Issue::all();

        return view('carbon.magazine.issues', compact('issues'));
    }

    public function storeIssue(Request $request){
        $this->validate($request,[
            'number' => 'required',
            'date' => 'required',
        ]);

        $issue = new Issue();
        $issue->number = $request['number'];
        $issue->date = $request['date'];
        $issue->description = $request['description'];
        $issue->magazine_id = $request['magazine_id'];
        $issue->is_active = true;


        if (!empty($request['cover'])){
            $issue->cover = $request->file('cover')->store('issues','public');
        }

        if (!empty($request['pdf'])){
            $issue->pdf = $request->file('pdf')->store('issuespdf');
        }

        if (!empty($request['epub'])){
            $issue->epub = $request->file('epub')->store('issuesepub');
        }

        $issue->save();

        return redirect('/admin/magazines');
    }

    public function editIssue($id){

        $magazines = Magazine::all();

        $issue = Issue::find($id);

        return view('carbon.magazine.issue_edit', compact('issue','magazines'));
    }

    public function updateIssue(Request $request, $id){
        $this->validate($request,[
            'number' => 'required',
            'date' => 'required',
        ]);

        $issue = Issue::find($id);
        $issue->number = $request['number'];
        $issue->date = $request['date'];
        $issue->description = $request['description'];
        $issue->magazine_id = $request['magazine_id'];

        if ($request['is_active'] == 'on'){
            $issue->is_active = true;
        }else{
            $issue->is_active = false;
        }

        if (!empty($request['cover'])){
            if (!empty($issue->cover)){
                Storage::delete('public/'.$issue->cover);
            }
            $issue->cover = $request->file('cover')->store('issues','public');
        }

        if (!empty($request['pdf'])){
            if (!empty($issue->pdf)){
                Storage::delete($issue->pdf);
            }
            $issue->pdf = $request->file('pdf')->store('issuespdf');
        }

        if (!empty($request['epub'])){
            if (!empty($issue->epub)){
                Storage::delete($issue->epub);
            }
            $issue->epub = $request->file('epub')->store('issuesepub');
        }

        $issue->update();

        return redirect()->back();
    }

    public function destroyIssue($id){
        $issue = Issue::find($id);

        if (!empty($issue->epub)){
            Storage::delete($issue->epub);
        }

        if (!empty($issue->pdf)){
            Storage::delete($issue->pdf);
        }

        $issue->delete();

        return redirect('/admin/magazines/'.$issue->magazine->id);
    }
}
