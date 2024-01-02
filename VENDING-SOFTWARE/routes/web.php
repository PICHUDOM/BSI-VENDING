<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlotsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MachinesController;
use App\Http\Controllers\DistrictsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Pro_categoryController;
use App\Http\Controllers\ProductController;

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
//login route
Auth::routes();
Route::redirect('/', '/login');
//Dashboard route
Route::get('/dashboard', [HomeController::class, 'index']);
//Vending Machines  route
Route::get('/vending_machines', [MachinesController::class, 'show']);
Route::post('/create', [MachinesController::class, 'store']);
Route::get('/destroy/{id}', [MachinesController::class, 'destroy']);
Route::get('/edit/{id}', [MachinesController::class, 'edit']);

//Locoation route
Route::get('/location', [AddressController::class, 'show']);
Route::post('adress/create', [AddressController::class, 'store']);

Route::get('/slot', [SlotsController::class, 'index']);

//product categories route
Route::get('/productCategory', [Pro_categoryController::class, 'index']);
Route::post('/create-proCategory', [Pro_categoryController::class, 'store']);
Route::get('productCategory/destroy/{id}', [Pro_categoryController::class, 'destroy']);
//Product route
Route::get('/products', [ProductController::class, 'index']);
Route::post('/create-product', [ProductController::class, 'store']);
Route::get('product/destroy/{id}', [ProductController::class, 'destroy']);

//user route
Route::get('/user', [UserController::class, 'index']);





// Route::get('/welcome', [DistrictsController::class, 'index']);
Route::get('/index', function () {
    return view('index');
});
