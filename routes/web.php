<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
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
    //return json_decode('{ "status": 404,  "message" : "not found" }');
    return View('welcome');
});

Route::group(['prefix' => 'api/v1'], function(){
    Route::get('/all', [ApiController::class, 'getAll'])->name('getAll');
    Route::get('/scp', [ApiController::class, 'getOne'])->name('getOne');
    Route::get('/range', [ApiController::class, 'getRange'])->name('getRange');
    Route::get('/scp_enemies', [ApiController::class, 'getScpEnemies'])->name('getRange');
    //TODO do a route to get a scp by the class

    /* --------- CLASSES --------- */
    Route::get('/allClasses', [ApiController::class, 'getAllClasses'])->name('getAllclasses');

    /* --------- Interview --------- */
    Route::get('/interviews', [ApiController::class, 'getInterviews'])->name('getInterviews');


    /* --------- SCRAPPING --------- */
    //Route::get('/getScrapping', [ApiController::class, 'getScrapping'])->name('getScrapping');
});
