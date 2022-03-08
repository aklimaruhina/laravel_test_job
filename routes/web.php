<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AttributeController;
use App\Models\User;
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

Route::get('/users', function(){
    $users = User::orderBy('id', 'asc')->get();
    dd($users);
});
Route::middleware(['auth', 'verified'])->group(function() {
	Route::get('/dashboard', function () {
	    return view('dashboard');
	})->name('dashboard');
	Route::resource('/users', UserController::class);
	Route::post('/user-enable-disable/{id}', [UserController::class, 'enableDisable'])->name('user-enable-disable');
	Route::resource('/products', ProductController::class);
	Route::post('/product-enable-disable/{id}', [ProductController::class, 'enableDisable'])->name('product-enable-disable');
	Route::resource('/attributes', AttributeController::class);
	Route::get('/add_attrb_val/{id}', [AttributeController::class, 'add_attrb_val'])->name('add_attrb_val');
	Route::post('/store_attrb/{id}', [AttributeController::class, 'store_attrb_val'])->name('store_attrb_val');
	Route::get('/add_varients/{id}', [AttributeController::class, 'add_varients'])->name('add_varients');
	Route::get('/attribute_id/{id}', [AttributeController::class, 'fetch_attribute']);
	Route::post('/store_attribute/{id}', [AttributeController::class, 'store_attribute'])->name('store_attribute');
	Route::post('/store_varients/{id}', [AttributeController::class, 'store_varients'])->name('store_varients');
	Route::get('/show_product/{id}', [AttributeController::class, 'show_product'])->name('show_product');
	Route::get('/edit_varient/{id}', [AttributeController::class, 'edit_varient'])->name('edit_varient');
	Route::post('/update_varient/{id}', [AttributeController::class, 'update_varient'])->name('update_varient');
});
require __DIR__.'/auth.php';
