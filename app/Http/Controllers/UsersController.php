<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.show', compact('users'));
    }

    public function edit($id)
    {
        if (request()->isMethod('post')) {
            $user = User::find($id);
            $user->name = request()->name;
            $user->email = request()->email;
            $user->profile = request()->profile;
            $user->save();
            return redirect()->to('/users')->send();
        }
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return $this->index();
    }
}