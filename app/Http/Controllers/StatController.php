<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stat;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::all();
        return view('stats.index', compact('stats'));
    }
    public function create()
    {
        return view('stats.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'player_id' => 'required',
            'game_id' => 'required',
            'goals' => 'required|integer',
            'assists' => 'required|integer',
            'shots' => 'required|integer',
            'hits' => 'required|integer',
            'pim' => 'required|integer',
        ]);
        Stat::create($request->all());
        return redirect()->route('stats.index');
    }
    public function show(Stat $stat)
    {
        return view('stats.show', compact('stat'));
    }
    public function edit(Stat $stat)
    {
        return view('stats.edit', compact('stat'));
    }
    public function update(Request $request, Stat $stat)
    {
        $request->validate([
            'goals' => 'required|integer',
            'assists' => 'required|integer',
            'shots' => 'required|integer',
            'hits' => 'required|integer',
            'pim' => 'required|integer',
        ]);
        $stat->update($request->all());
        return redirect()->route('stats.index');
    }
    public function destroy(Stat $stat)
    {
        $stat->delete();
        return redirect()->route('stats.index');
    }
}
