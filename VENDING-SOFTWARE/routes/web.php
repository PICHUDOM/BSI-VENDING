<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MachinesController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::redirect('/', '/login');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/vending_machines', [MachinesController::class, 'show']);
Route::post('/create', [MachinesController::class, 'store']);
