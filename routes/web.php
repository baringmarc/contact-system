<?php

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

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [ContactController::class, 'index']);
    Route::get('/create', [ContactController::class, 'create']);
    Route::post('/store', [ContactController::class, 'store']);
    Route::get('/{id}/edit', [ContactController::class, 'edit']);
    Route::put('/update/{id}', [ContactController::class, 'update']);
    Route::delete('/destroy/{id}', [ContactController::class, 'destroy']); 
});

Route::post('/filter', [ContactController::class, 'filter']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');