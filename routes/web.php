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

//Route::get('items/cart', 'ItemsController@cart');

Route::get('cart', [ItemsController::class,"cart"]);

//Route::get('add/{id}', [ItemsController::class,"add"]);

Route::post('add/{id}', [ItemsController::class,"add"]);

Route::resource('items', ItemsController::class);

//Route::get('items/cart', [ItemsController::class,"cart"]);

//Route::get('add/{id}', 'ItemsController@add');

//Route::get('cart', 'ItemsController@cart');