<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';

        $user->save();

        return redirect()->route('users.index')->with('success', 'User made admin successfully!');

    }

    public function edit()
    {
        return view('users.edit', ['user' => auth()->user()]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

}