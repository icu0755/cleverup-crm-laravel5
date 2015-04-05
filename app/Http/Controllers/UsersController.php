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
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        User::create($request->all());

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('user.edit')->withUser($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('users.index');
    }
}
