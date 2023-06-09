<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AppController};

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

Route::get('/', [AppController::class, 'index'])->middleware(['verify.shopify'])->name('home');

//This will redirect user to login page.
Route::get('/login', function () {
    if (Auth::user()) {
        return redirect()->route('home');
    }
    return view('login');
})->middleware(['verify.shopify'])->name('login');

Route::get('/get-config', [AppController::class, 'save_config'])->middleware(['verify.shopify']);

Route::get('/Call', [AppController::class, 'call'])->middleware(['verify.shopify']);
Route::get('/WhatsApp', [AppController::class, 'whatsapp'])->middleware(['verify.shopify']);
Route::get('/Call/WhatsApp', [AppController::class, 'callandwhatsapp'])->middleware(['verify.shopify']);
