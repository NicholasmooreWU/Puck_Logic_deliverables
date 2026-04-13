@extends('layouts.app')
@section('content')
<h1>Validate Stat Entry</h1>
<p>Player: {{ $stat->player->name }}</p>
<p>Game: {{ $stat->game->homeTeam->name }} vs {{ $stat->game->awayTeam->name }}</p>
<p>Goals: {{ $stat->goals }}</p>
<p>Assists: {{ $stat->assists }}</p>
<p>Shots on Goal: {{ $stat->shots }}</p>
<p>Hits: {{ $stat->hits }}</p>
<p>Penalty Minutes (PIM): {{ $stat->pim }}</p>
<form action="{{ route('stats.confirm', $stat) }}" method="POST">
    @csrf
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Confirm</button>
    <a href="{{ route('stats.edit', $stat) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
    <a href="{{ route('stats.index', $stat->game) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
</form>

@endsection