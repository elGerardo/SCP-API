<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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
    return json_decode('{ "status": 404,  "message" : "not found" }');
});

Route::group(['prefix' => 'api/v1'], function(){
    Route::get('/all', [ApiController::class, 'getAll'])->name('getAll');
    Route::get('/scp', [ApiController::class, 'getOne'])->name('getOne');
    Route::get('/range', [ApiController::class, 'getRange'])->name('getRange');

    //TODO do a classes get
    Route::get('/allClasses', [ApiController::class, 'getAllClasses'])->name('getAllclasses');
});
