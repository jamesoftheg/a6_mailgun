<?php

use Illuminate\Support\Facades\Route;
use App\Mail\OrderShipped;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ItemsController;

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

// Using a controller
Route::get('/', [PagesController::class,"index"]);

Route::get('cart', [ItemsController::class,"cart"]);

Route::post('add/{id}', [ItemsController::class,"add"]);

Route::post('checkout', [ItemsController::class,"checkout"]);

Route::resource('items', ItemsController::class);

Route::post('emails', [CheckoutController::class,"emails"]);

Route::resource('emails/orders', CheckoutController::class);