<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        $roles = [];
        foreach (\App\Role::all() as $role) {
            $roles[$role->id] = $role->name;
        }
        return view('user.create')->withRoles($roles);
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->attach(\Input::get('roles'));

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $roles = [];
        foreach (\App\Role::all() as $role) {
            $roles[$role->id] = $role->name;
        }
        return view('user.edit')->withUser($user)->withRoles($roles);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync([\Input::get('roles')]);

        return redirect()->route('users.index');
    }
}
