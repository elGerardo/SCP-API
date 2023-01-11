<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get("/", function(){
    return response()->json([
        "title" => "About",
        "message" => "This API was done with the intention to be a little project to practice Laravel and .NET Entity Framework, but currently I have the intention to grow up this API in order to be the first SCP API provider with the most complety information about the SCP world. This API is accesible only by HTTP methods and it's not needed an authentication to consume.",
    ]);
});

Route::group(['prefix' => 'v1'], function(){

    Route::group(['prefix' => 'scp'], function(){
        Route::get('/all', [Controllers\ScpController::class, 'get'])->name('getScp');
        Route::get('/find', [Controllers\ScpController::class, 'find'])->name('findScp');
        Route::get('/range', [Controllers\ScpController::class, 'getRange'])->name('getRange');
        Route::get('/enemies', [Controllers\ScpController::class, 'getScpEnemies'])->name('getEnemies');
    });

    Route::group(['prefix' => 'classes'], function(){
        Route::get('/all', [Controllers\ClassesController::class, 'get'])->name('getClasses');
        Route::get('/find', [Controllers\ClassesController::class, 'find'])->name('findClass');
    });

    Route::group(['prefix' => 'interviews'], function(){
        Route::get('/all', [Controllers\InterviewsController::class, 'get'])->name('getInterview');
        Route::get('/find', [Controllers\InterviewsController::class, 'find'])->name('findInterviews');
    });
});

/* --------- ADMIN POST --------- */
Route::group(["middleware" => "verifyAdmin", "prefix" => "admin"], function(){
    Route::post('/register_scp', [Controllers\ScpController::class, 'registerScp'])
    ->name('registerScp')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

    Route::post('/register_features', [Controllers\FeaturesController::class, 'registerFeatures'])
    ->name('registerFeatures')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
});
    


