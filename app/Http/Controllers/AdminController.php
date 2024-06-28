<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->withErrors('You do not have access to the admin panel.');
        }

        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function assignRole(Request $request, User $user)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->withErrors('You do not have access to the admin panel.');
        }

        $request->validate([
            'role' => 'required|in:admin,authenticated_user,team_member'
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'User role updated successfully.');
    }
}
