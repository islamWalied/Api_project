<?php


//Route::usersResource('/users',UserController::class);

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
 * -- TODO --
 * make middleware of auth to avoid hacking by usual users and the middleware not by function make it by array
 *
 * -- BAD PRACTICE --
 *
 * is to put a middleware in every Route
 *
 * -- BEST PRACTICE --
 *
 * is to make a group with one middleware that supervisors of all of these Routes
 * */

Route::/*middleware('auth')*/
    prefix('islam')
    ->name('users.')
    ->namespace("App\Http\Controllers")
    ->group(function (){

    Route::get('/users',[UserController::class,'index']);

    Route::get('/users/{user}',[UserController::class,'show']);


    Route::post('/users',[UserController::class,'store']);

    Route::patch('/users/{user}',[UserController::class,'update']);

    Route::delete('/users/{user}',[UserController::class,'destroy']);


    });

