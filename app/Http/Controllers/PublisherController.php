<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublisherController extends Controller
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
        $publishers = Publisher::all();
        return view('carbon.publisher.publishers', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carbon.publisher.publisher_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $publisher = new Publisher();
        $publisher->name = $request['name'];
        $publisher->description = $request['description'];
        $publisher->url = $request['url'];
        if ($request['is_active'] == 'on'){
            $publisher->is_active = true;
        }else{
            $publisher->is_active = false;
        }

        if (!empty($request['logo'])){
            $publisher->logo = $request->file('logo')->store('logos','public');
        }

        $publisher->save();

        $publishers = Publisher::all();

        return view('carbon.publisher.publishers', compact('publishers'));
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
        $publisher = Publisher::find($id);

        return view('carbon.publisher.publishers_edit', compact('publisher'));
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
        $publisher = Publisher::find($id);
        $publisher->name = $request['name'];
        $publisher->description = $request['description'];
        $publisher->url = $request['url'];
        if ($request['is_active'] == 'on'){
            $publisher->is_active = true;
        }else{
            $publisher->is_active = false;
        }

        if (!empty($request['logo'])){
            if (!empty($publisher->logo)){
                Storage::delete('public/'.$publisher->logo);
            }
            $publisher->logo = $request->file('logo')->store('logos','public');
        }

        $publisher->save();

        $publishers = Publisher::all();

        return view('carbon.publisher.publishers', compact('publishers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = Publisher::find($id);
        Storage::delete('public/'.$publisher->logo);
        $publisher->delete();

        $publishers = Publisher::all();

        return view('carbon.publisher.publishers', compact('publishers'));
    }
}
