<?php

use App\Http\Controllers\MinController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login',[MinController::class,'login']);
Route::post('/register',[MinController::class,'register']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/addReport',[MinController::class,'AddLostPhone']); 
    Route::get('/search/{imei}',[MinController::class,'Search']);
    Route::get('/Data',[MinController::class,'GetData']);
});