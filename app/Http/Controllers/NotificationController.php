<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::all();

        return view('carbon.notifications',compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carbon.notification_create');
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
            'content' => 'required'
        ]);

        $notification = new Notification();
        $notification->title = $request['title'];
        $notification->content  = $request['content'];
        if (!empty($request['image'])){
            $notification->img = $request->file('image')->store('notifications','public');
        }else{
            $notification->img = "no image";
        }
        $notification->save();

        return redirect()->to('/admin/notifications');
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
        $notification = Notification::find($id);

        return view('carbon.notification_edit', compact('notification'));
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
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $notification = Notification::find($id);
        $notification->title = $request['title'];
        $notification->content  = $request['content'];
        if (!empty($request['image'])){
            /*if (!empty($notification->img)){*/
                Storage::delete('public/'.$notification->img);

            $notification->img = $request->file('image')->store('notifications','public');
        }
        $notification->update();

        return redirect()->to('/admin/notifications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);
        Storage::delete('public/'.$notification->img);
        $notification->delete();

        return redirect()->to('/admin/notifications');
    }
}
