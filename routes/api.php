<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/notes','App\Http\Controllers\Controller@note');
Route::get('/notes/{note}','App\Http\Controllers\Controller@getnote');
Route::post('/notes','App\Http\Controllers\Controller@postnote');
Route::get('/notes/{note}/edit','App\Http\Controllers\Controller@editnote');
Route::put('/notes/{note}','App\Http\Controllers\Controller@putnote');
Route::delete('/notes/{note}','App\Http\Controllers\Controller@delete');
