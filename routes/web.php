<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PointofSaleController;

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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//POINT OF SALE
Route::get('point-of-sale', [PointofSaleController::class, 'index']);
Route::get('add-to-cart/{title}/{price}', [PointofSaleController::class, 'addToCart']);
Route::get('add-quantity/{id}', [PointofSaleController::class, 'addQuantity']);
Route::get('decrement-quantity/{id}', [PointofSaleController::class, 'decrementQuantity']);
Route::get('delete-cart', [PointofSaleController::class, 'deleteCart']);
Route::post('place-order/{total}', [PointofSaleController::class, 'orders']);


Route::middleware(['auth', 'verified'])->group(function(){
    //PLACE YOUR ROUTES HERE FOR VERIFIED USER


    //APPS
    Route::get('apps-todolist', [HomeController::class, 'todolist']);

    //CATEGORIES maaayos
    Route::get('categories', [CategoryController::class, 'index']);
    Route::post('create-category', [CategoryController::class, 'create']);
    Route::put('update-category/{slug}', [CategoryController::class, 'update']);
    Route::get('delete-category/{slug}', [CategoryController::class, 'delete']);


    //MENU maayos
    Route::get('menu', [MenuController::class, 'index']);
    Route::post('create-menu', [MenuController::class, 'createMenu']);
    Route::put('update-menu/{id}', [MenuController::class, 'update']);
    Route::get('delete-menu/{id}', [MenuController::class, 'delete']);

    // Route for displaying menu items
    Route::get('menu', [MenuController::class, 'index']);
    
    // Route for adding items to cart
    Route::post('add-to-cart', [MenuController::class, 'addToCart']);

    //order
    Route::get('order', [OrderController::class, 'index']);
    Route::post('create-order', [OrderController::class, 'createOrder']);
    Route::put('update-order/{id}', [OrderController::class, 'update']);
    Route::get('delete-order/{id}', [OrderController::class, 'delete']);

    //stock
    Route::get('stock', [StockController::class, 'index']);
    Route::post('create-stock', [StockController::class, 'createStock']);
    Route::put('update-stock/{item}', [StockController::class, 'update']);
    Route::get('delete-stock/{id}', [StockController::class, 'delete']);





    
});


require __DIR__.'/auth.php';
