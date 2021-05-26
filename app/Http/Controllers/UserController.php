<?php

namespace App\Http\Controllers;
// use App\Modeld\changeRole;
use App\Models\Role;
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
        $users = User::all();
        // return   $users;
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return $user; 
        $roles = Role::all();
        // return view('admin.users.show', compact('user', 'roles'));
        return view('admin.users.show',compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function chageRole(Request $request, User $user)
    {
        if(auth()->user()->role_id != 1 || auth()->user()->id !== $user->id){
            return back()->with('error', 'you are not allow to do this!');
        }

        // if($user->role_id !=1){
        //     return back()->with('error', 'you are not allow to do this!');
        // }
        $request->validate([
            'role_id'=> 'required'
        ]);
        // return [' $request'=> $request->all(), '$user' => $user];
        $user->role_id = $request->role_id;
        $user->save();
        return back()->with('success', 'Role Changed Successfuly!');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function chageStatus(User $user)
    {
        // return  $request->all();
        $user->status = $user->is_active ? 0 : 1;
        $user->save();
        return back()->with('success', 'user status updated succesfylly!');
        // return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
