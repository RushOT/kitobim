<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        $users = User::all();
        return view('carbon.user.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carbon.user.user_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request['name'];
        if (!empty($request['email'])){
            $user->email = $request['email'];
            $user->email_verified = true;
        }
        if (!empty($request['phone'])){
            $user->phone = $request['phone'];
            $user->phone_verified = true;
        }

        $user->last_login = now();

        if ($request['is_active'] == 'on'){
            $user->is_active = true;
        }else{
            $user->is_active = false;
        }

        $user->password = bcrypt($request['password']);
        $user->birth = $request['birth'];
        $user->city = $request['city'];

        if ($request['is_admin'] == 'on'){
            $user->is_admin = true;
        }else{
            $user->is_admin = false;
        }

        if ($request['is_staff'] == 'on'){
            $user->is_staff = true;
        }else{
            $user->is_staff = false;
        }

        $user->save();

        return redirect('/admin/users');
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
        $user = User::find($id);

        return view('carbon.user.user_edit', compact('user'));
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
        $user = User::find($id);
        $user->name = $request['name'];
        if (!empty($request['email'])){
            $user->email = $request['email'];
            $user->email_verified = true;
        }
        if (!empty($request['phone'])){
            $user->phone = $request['phone'];
            $user->phone_verified = true;
        }

        $user->last_login = now();

        if ($request['is_active'] == 'on'){
            $user->is_active = true;
        }else{
            $user->is_active = false;
        }

        if (!empty($request['password'])){
            $user->password = bcrypt($request['password']);
        }

        $user->birth = $request['birth'];
        $user->city = $request['city'];

        if ($request['is_admin'] == 'on'){
            $user->is_admin = true;
        }else{
            $user->is_admin = false;
        }

        if ($request['is_staff'] == 'on'){
            $user->is_staff = true;
        }else{
            $user->is_staff = false;
        }

        $user->update();

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/users');
    }
}
