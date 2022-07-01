<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoteController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('v1/lotes', 'LoteController')->middleware('auth:api');
/*Route::get('/Lotes/{lote}', 'LoteController@show')->name('show');
Route::post('/Lotes/{lote}', 'LoteController@destroy')->name('delete');
Route::post('/Lotes/{lote}', 'LoteController@show')->name('show');

Route::get('/token', function()
{
   $token = Str::random(60);
   return $token;
});*/
