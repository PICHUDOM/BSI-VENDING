<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlotsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MachinesController;
use App\Http\Controllers\DistrictsController;




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
Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/vending_machines', [MachinesController::class, 'show']);
Route::post('/create', [MachinesController::class, 'store']);
Route::get('/destroy/{id}', [MachinesController::class, 'destroy']);
Route::get('/location', [AddressController::class, 'show']);
Route::post('/create', [AddressController::class, 'store']);
Route::get('/slot', [SlotsController::class, 'show']);



Route::get('/welcome', [DistrictsController::class, 'index']);
