<?php

use App\Http\Controllers\Shortener\LinkShortenerController;
use App\Http\Controllers\Shortener\DashboardShortenerController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{alias?}', [LinkShortenerController::class, 'home'])->name('home');
Route::post('/', [LinkShortenerController::class, 'insert']);

Route::prefix('/a')->group(function () {

    Route::get('/dashboard', [DashboardShortenerController::class, 'dashboard'])
        ->middleware(['auth'])
        ->name('dashboard');

    Route::post('/delete', [DashboardShortenerController::class, 'delete'])
        ->middleware(['auth'])
        ->name('delete-link');

    require __DIR__.'/auth.php';
});
