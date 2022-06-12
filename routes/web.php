<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LostController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/search',[HomeController::class,'getSearch']);
Route::get('/lostphone',[LostController::class,'index']);
Route::post('/addlostphone',[LostController::class,'report'])->middleware('auth');
Route::post('/serach_phone',[LostController::class,'search4']);
Auth::routes();
Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/dashboard', [AdminController::class,'index']);
    Route::get('/user', [AdminController::class,'user']);
    Route::post('/update_user/{id}', [AdminController::class,'update_User']);
    Route::get('/delete_user/{id}', [AdminController::class,'delete_User']);
    Route::get('/report', [AdminController::class,'getreport']);
    Route::post('/delete_report/{id}', [AdminController::class,'delete_report']);
    Route::PUT('/update_report/{id}', [AdminController::class,'update_report']);
    
 });


