<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';

        $user->save();

        session()->flash('success', 'Admin creted successfully');

        return redirect(route('users.index'));
    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Profile Updated successfully');

        return redirect(route('users.index'));

    }
}
