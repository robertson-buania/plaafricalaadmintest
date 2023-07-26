<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlaafricalawFirmController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/home', [PlaafricalawFirmController::class, 'home']);
Route::post('/contact', [PlaafricalawFirmController::class, 'contact']);
Route::get('/equipes', [PlaafricalawFirmController::class, 'avocats']);

Route::get('/equipes/detail/{id}', [PlaafricalawFirmController::class, 'avocat_detail']);


Route::get('/presence', [PlaafricalawFirmController::class, 'presence']);


Route::get('/presence/detail/{id}', [PlaafricalawFirmController::class, 'presence_detail']);

Route::get('/publication', [PlaafricalawFirmController::class, 'publication']);


Route::get('/publication/detail/{id}', [PlaafricalawFirmController::class, 'publication_detail']);


Route::get('/expertise', [PlaafricalawFirmController::class, 'expertise']);


Route::get('/expertise/detail/{id}', [PlaafricalawFirmController::class, 'expertise_detail']);
