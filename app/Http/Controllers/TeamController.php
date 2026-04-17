<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }
    public function create()
    {
        $this->authorize('create', Team::class);
        return view('teams.create');
    }
    public function store(Request $request)
    {
        $this->authorize('create', Team::class);
        $request->validate(['name' => 'required']);
        Team::create($request->all());
        return redirect()->route('teams.index');
    }
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }
    public function edit(Team $team)
    {
        $this->authorize('update', $team);
        return view('teams.edit', compact('team'));
    }
    public function update(Request $request, Team $team)
    {
        $this->authorize('update', $team);
        $request->validate(['name' => 'required']);
        $team->update($request->all());
        return redirect()->route('teams.index');
    }
    public function destroy(Team $team)
    {
        $this->authorize('delete', $team);
        $team->delete();
        return redirect()->route('teams.index');
    }
}
