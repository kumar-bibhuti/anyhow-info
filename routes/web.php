<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::redirect('/','login');


//store manager routes
Route::middleware(['auth', 'S_managerAccess'])->group(function () {
  
    Route::get('/s_manager', [HomeController::class, 's_manager'])->name('s_manager');
});

//department manager routes
Route::middleware(['auth', 'D_managerAccess'])->group(function () {
  
    Route::get('/d_manager', [HomeController::class, 'd_manager'])->name('d_manager');

});

//inventory 
        Route::get("/inventory",[InventoryController::class,'index'])->name('inventory.index');
        Route::get("inventory/create",[InventoryController::class,'create'])->name('inventory.create');
        Route::post("inventory/store",[InventoryController::class,'store'])->name('inventory.store');
        Route::get("inventory/edit/{id}",[InventoryController::class,'edit'])->name('inventory.edit');
        Route::put("inventory/update/{id}",[InventoryController::class,'update'])->name('inventory.update');
        Route::delete("inventory/delete/{id}",[InventoryController::class,'destroy'])->name('inventory.delete'); 
        
 //user
 Route::get("/user", [UserController::class,'index'])->name('user.index');
        Route::get("user/create",[UserController::class,'create'])->name('user.create');
        Route::post("user/store",[UserController::class,'store'])->name('user.store');
        Route::get("user/edit/{id}",[UserController::class,'edit'])->name('user.edit');
        Route::put("user/update/{id}",[UserController::class,'update'])->name('user.update');
        Route::delete("user/delete/{id}",[UserController::class,'destroy'])->name('user.delete');       