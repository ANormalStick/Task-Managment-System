<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::all();
        return view('boards.index', compact('boards'));
    }

    public function create()
    {
        return view('boards.create');
    }

    public function store(Request $request)
    {
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
        return view('boards.edit', compact('board'));
    }

    public function update(Request $request, Board $board)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $board->update($request->all());
        return redirect()->route('boards.index');
    }

    public function destroy(Board $board)
    {
        $board->delete();
        return redirect()->route('boards.index');
    }
}
