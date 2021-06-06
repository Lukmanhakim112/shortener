<?php

use App\Http\Controllers\Shortener\LinkShortenerController;
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

Route::get('/{alias?}', [LinkShortenerController::class, 'home']);
Route::post('/', [LinkShortenerController::class, 'insert']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/a')->group(function () {
    require __DIR__.'/auth.php';
});
