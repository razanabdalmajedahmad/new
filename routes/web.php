<?php

use App\Http\Controllers\Inventorycontrolar;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('create');
});
Route::get('createinventory',[Inventorycontrolar::class,'create'])->name('create');
Route::post('save',[Inventorycontrolar::class,'save'])->name('save');
Route::get('list',[Inventorycontrolar::class,'list'])->name('list');
Route::post('list2',[Inventorycontrolar::class,'list2'])->name('list2');
Route::post('deleteinvoice',[Inventorycontrolar::class,'deleteinvoice'])->name('deleteinvoice');
Route::post('download',[Inventorycontrolar::class,'download'])->name('download');
Route::get('edit/{id?}',[Inventorycontrolar::class,'edit'])->name('edit');
Route::post('update',[Inventorycontrolar::class,'update'])->name('update');
