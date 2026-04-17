<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use App\Models\League;

class LeagueController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $leagues = League::all();
        return view('leagues.index', compact('leagues'));
    }
    public function create()
    {
        $this->authorize('create', League::class);
        return view('leagues.create');
    }
    public function store(Request $request)
    {
        $this->authorize('create', League::class);
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
        $this->authorize('update', $league);
        return view('leagues.edit', compact('league'));
    }
    public function update(Request $request, League $league)
    {
        $this->authorize('update', $league);
        $request->validate(['name' => 'required']);
        $league->update($request->all());
        return redirect()->route('leagues.index');
    }
    public function destroy(League $league)
    {
        $this->authorize('delete', $league);
        $league->delete();
        return redirect()->route('leagues.index');
    }
}
