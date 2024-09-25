<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', function () {
    if (Auth::check() && Auth::user()->is_admin === 1) {

        return view('admin.dashboard');
    }
    return redirect('/');
})->name('admin.dashboard');

Route::middleware(['auth'])->group(function () {
    // Customer Routes
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

    // Admin Routes
    Route::get('/admin/tickets', [TicketController::class, 'adminIndex'])->name('admin.tickets.index');
    Route::get('/admin/tickets/{ticket}', [TicketController::class, 'show'])->name('admin.tickets.show');
    Route::post('/admin/tickets/{ticket}/close', [TicketController::class, 'close'])->name('admin.tickets.close');
});