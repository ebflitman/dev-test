<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = '/user/create';
        $data['user'] = null;
        return view('users/create_edit', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email:rfc,dns|unique:users,email',
                'password' => 'required'
            ]
        );

        User::create($request->all());

        return redirect('/')->with('success','User successfully saved.');
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
    public function edit(User $user)
    {
        $data['action'] = '/user/1/update';
        $data['user'] = $user;
        return view('users.create_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email:rfc,dns|unique:users,email,'.$user->id
            ]
        );
        $save = $request->all();

        if(strlen($save['password']) === 0)
            unset($save['password']);

        $user->fill($save)->save();

        return redirect('/')->with('success','User saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        // confirmation would probably normally be handled on the client side but for simplicity...
        if(!isset($request->confirm))
            return view('users.confirm_delete', compact('user'));

        $user->delete();

        return redirect('/')->with('success', 'User successfully deleted.');
    }
}
