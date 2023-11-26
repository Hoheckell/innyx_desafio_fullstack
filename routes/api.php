<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return "Health";
});

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'login'])->name('login');
Route::get('/image/{imagem}', [ImageController::class, 'getmidia']);

Route::middleware('auth')->group(function(){
    Route::post('/produtos/{id}/image/update', [ProdutoController::class, 'imageUpdate']);
    Route::delete('/produtos/{id}/image/delete', [ProdutoController::class, 'deleteImage']);
    Route::resource('/produtos', ProdutoController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/categorias', CategoriaController::class);
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/refresh',[AuthController::class,'refresh'])->name('refresh');
});
