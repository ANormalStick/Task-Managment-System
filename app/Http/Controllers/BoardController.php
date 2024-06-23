<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::all();
        return view('boards.index', compact('boards'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('boards.index')->withErrors('You do not have permission to create boards.');
        }

        return view('boards.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('boards.index')->withErrors('You do not have permission to create boards.');
        }

        $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        Board::create($request->all());
        return redirect()->route('boards.index');
    }

    public function show(Board $board)
    {
        return view('boards.show', compact('board'));
    }

    public function edit(Board $board)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('boards.index')->withErrors('You do not have permission to edit boards.');
        }

        return view('boards.edit', compact('board'));
    }

    public function update(Request $request, Board $board)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('boards.index')->withErrors('You do not have permission to edit boards.');
        }

        $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $board->update($request->all());
        return redirect()->route('boards.index');
    }

    public function destroy(Board $board)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('boards.index')->withErrors('You do not have permission to delete boards.');
        }

        $board->delete();
        return redirect()->route('boards.index');
    }
}
