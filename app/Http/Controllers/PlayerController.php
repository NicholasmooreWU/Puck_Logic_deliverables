<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }
    public function create()
    {
        $teams = \App\Models\Team::all();
        return view('players.create', compact('teams'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'team_id' => 'required|exists:teams,id',
        ]);
        Player::create($request->all());
        return redirect()->route('players.index');
    }
    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }
    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }
    public function update(Request $request, Player $player)
    {
        $request->validate(['name' => 'required']);
        $player->update($request->all());
        return redirect()->route('players.index');
    }
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index');
    }
}
