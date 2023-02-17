<?php

use App\Http\Controllers\EmailStatusController;
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


Route::get('email-status', [EmailStatusController::class, 'index'])->name('email-status.index');
Route::any('webhook', [EmailStatusController::class, 'webhook'])->name('webhook');
