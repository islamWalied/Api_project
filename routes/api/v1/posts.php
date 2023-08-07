<?php


//Route::postsResource('/posts',PostController::class);

use App\Http\Controllers\PostController;
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
    ->name('posts.')
    ->namespace("App\Http\Controllers")
    ->group(function (){

    Route::get('/posts',[PostController::class,'index']);

    Route::get('/posts/{post}',[PostController::class,'show']);


    Route::post('/posts',[PostController::class,'store']);

    Route::patch('/posts/{post}',[PostController::class,'update']);

    Route::delete('/posts/{post}',[PostController::class,'destroy']);


    });

