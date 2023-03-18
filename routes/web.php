<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\FederatedLoginAuthSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemImportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeaponController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/auth/{driver}", [AuthController::class, 'redirect'])->name('login.auth');
Route::get("/auth/{driver}/success", [AuthController::class, 'callback'])->name('login.auth.success');

Route::get('/items', [ItemController::class, 'get_items']);
Route::get('/weapons', [WeaponController::class, 'get_weapons']);

//require __DIR__.'/auth.php';
Route::middleware('guest')->group(function () {
	Route::get('login', [FederatedLoginAuthSessionController::class, 'create'])->name('login');
	Route::post('login', [FederatedLoginAuthSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
	Route::post('logout', [FederatedLoginAuthSessionController::class, 'destroy'])->name('logout');
	Route::get('/items/import', [ItemImportController::class, 'import']);
});
