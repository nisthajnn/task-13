<?php

namespace App\Http\Controllers;

use App\Models\UserList;
use App\Models\ProjectList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserList::all();
        return view('user.index', compact('users'))->with('users' , $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        UserList::create($input);        
        return redirect('users');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userList  $userList
     * @return \Illuminate\Http\Response
     */
    public function show(UserList $userList): View
    {
        // 
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userList  $userList
     * @return \Illuminate\Http\Response
     */
    public function edit(UserList $userList)
    {
        $user = $userList;
        return view('user.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userList  $userList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = UserList::findOrFail($id);
        $input = $request->all();
        $user->update($input);
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * UserList $userList
     * @param  \App\Models\userList  $userList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UserList::findOrFail($id);
        $user->delete();
        return redirect('users')->with('flash_message', 'Contact deleted!'); 
    }
}
