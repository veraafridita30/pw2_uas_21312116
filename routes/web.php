<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UasController;

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/master', function(){
    return view('.layout.master');
});

Route::get('/uas', [UasController::class,'index']);
Route::get('/uas/create', [UasController::class,'create']);
Route::post('/uas', [UasController::class,'store']);
Route::get('/uas/{uas_id}/edit', [UasController::class,'edit']);
Route::put('/uas/{uas_id}', [UasController::class,'update']);
Route::delete('/uas/{uas_id}', [UasController::class,'destroy']);
