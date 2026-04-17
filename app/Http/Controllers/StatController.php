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
        $this->authorize('create', \App\Models\Stat::class);
        return view('stats.create');
    }
    public function store(Request $request)
    {
        $this->authorize('create', \App\Models\Stat::class);
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
        $this->authorize('update', $stat);
        return view('stats.edit', compact('stat'));
    }
    public function update(Request $request, Stat $stat)
    {
        $this->authorize('update', $stat);
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
        $this->authorize('delete', $stat);
        $stat->delete();
        return redirect()->route('stats.index');
    }
}
