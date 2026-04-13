<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;

class LeagueController extends Controller
{
    public function index()
    {
        $leagues = League::all();
        return view('leagues.index', compact('leagues'));
    }
    public function create()
    {
        return view('leagues.create');
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        League::create($request->all());
        return redirect()->route('leagues.index');
    }
    public function show(League $league)
    {
        return view('leagues.show', compact('league'));
    }
    public function edit(League $league)
    {
        return view('leagues.edit', compact('league'));
    }
    public function update(Request $request, League $league)
    {
        $request->validate(['name' => 'required']);
        $league->update($request->all());
        return redirect()->route('leagues.index');
    }
    public function destroy(League $league)
    {
        $league->delete();
        return redirect()->route('leagues.index');
    }
}
