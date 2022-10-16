<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScpController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\InterviewsController;
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
    return View('welcome');
});

Route::get('/endpoints', function () {
    return View('endpoints');
});

Route::group(['prefix' => 'api/v1'], function(){

    Route::group(['prefix' => 'scp'], function(){
        Route::get('/all', [ScpController::class, 'get'])->name('getScp');
        Route::get('/find', [ScpController::class, 'find'])->name('findScp');
        Route::get('/range', [ScpController::class, 'getRange'])->name('getRange');
        Route::get('/enemies', [ScpController::class, 'getScpEnemies'])->name('getRange');
    });

    Route::group(['prefix' => 'classes'], function(){
        Route::get('/all', [ClassesController::class, 'get'])->name('getClasses');
        Route::get('/find', [ClassesController::class, 'find'])->name('findClass');
    });

    Route::group(['prefix' => 'interviews'], function(){
        Route::get('/all', [InterviewsController::class, 'get'])->name('getInterview');
        Route::get('/find', [InterviewsController::class, 'find'])->name('findInterviews');
    });

    
    /* --------- POST --------- */
    Route::post('/register_scp', [ApiController::class, 'registerScp'])
    ->name('registerScp')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    
    Route::post('/register_features', [ApiController::class, 'registerFeatures'])
    ->name('registerFeatures')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);;
    
    /* --------- SCRAPPING --------- */
    //Route::get('/getScrapping', [ApiController::class, 'getScrapping'])->name('getScrapping');
});


