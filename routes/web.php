<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DressController;
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

// Route::get('/', function () {
// return view('welcome');
// });
// ctrl + /


// untuk menamplikan data
Route::get('/', [DressController::class, 'show'])->name('show');

Route::get('/create', [DressController::class, 'create'])->name('create');

// untuk menyimpan data
Route::post('/store', [DressController::class, 'store'])->name('store');
