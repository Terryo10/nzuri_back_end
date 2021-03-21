<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('services', [ServicesController::class, 'services'])->name("service");
Route::get('services/{id}', [ServicesController::class, 'singleService'])->name("single_service");
Route::get('category/products/{id}', [CategoriesController::class, 'products'])->name("service_category");
Route::resource('photos', BookingsController::class);


Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');

