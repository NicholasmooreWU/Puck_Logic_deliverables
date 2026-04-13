@extends('layouts.app')
@section('content')
<h1>Bulk Stat Import</h1>
<form method="POST" action="{{ route('stats.bulk.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="stats_file">
    <button type="submit">Import</button>
</form>
@endsection