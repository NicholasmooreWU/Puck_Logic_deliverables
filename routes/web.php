<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\LeagueController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\RadarController;
use App\Http\Controllers\BracketController;
use App\Http\Controllers\BracketSeedController;

Route::middleware('auth')->group(function () {
    Route::resource('leagues', LeagueController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);
    Route::resource('stats', StatController::class);

    Route::get('/analytics/clustering', [AnalyticsController::class, 'showClustering'])->name('analytics.clustering');
    Route::post('/analytics/clustering/trigger', [AnalyticsController::class, 'triggerClustering'])->name('analytics.clustering.trigger');
    Route::get('/analytics/radar', [RadarController::class, 'show'])->name('analytics.radar');
    Route::get('/brackets/roundrobin', [BracketController::class, 'roundRobin'])->name('brackets.roundrobin');
    Route::get('/brackets/seeding', [BracketSeedController::class, 'showSeeding'])->name('brackets.seeding');
});
