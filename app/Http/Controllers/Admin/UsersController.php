<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Support\Facades\Gate;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'));
        }

        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $name = $request->input('name');
        $email = $request->input('email');

        $user = User::find($user->id);
        $user->name = $name;
        $user->email = $email;


        if($user->save()){
            $request->session()->flash('success', $user->name . " a bien été modifié");
        }else{
            $request->session()->flash('error', "Le user n'a pas été modifié");
        };


        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {

        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        }

        $user->roles()->detach();
        $user->delete();

        if($user->delete()){
            $request->session()->flash('error', "Le user n'a pas été supprimé");

        }else{
            $request->session()->flash('success', $user->name . " a bien été supprimé");
        };

        return redirect()-> route('admin.users.index');
    }
}
