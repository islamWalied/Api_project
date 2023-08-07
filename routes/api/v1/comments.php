<?php


//Route::commentResource('/comment',CommentController::class);

use App\Http\Controllers\CommentController;
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
    ->name('comments.')
    ->namespace("App\Http\Controllers")
    ->group(function (){

        Route::get('/comment',[CommentController::class,'index']);

        Route::get('/comment/{comment}',[CommentController::class,'show']);


        Route::post('/comment',[CommentController::class,'store']);

        Route::patch('/comment/{comment}',[CommentController::class,'update']);

        Route::delete('/comment/{comment}',[CommentController::class,'destroy']);


    });

