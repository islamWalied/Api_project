<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')
    ->group(function (){

        /**      we have a problem here
         *
         *      even the project is seems simple, but we must know a way to iterate for each file as long as the project become larger
         *
         *     So we will iterate through all files and require each file in each iteration
         **/



/*    require __DIR__ . '/api/v1/users.php';
    require __DIR__ . '/api/v1/posts.php';
    require __DIR__ . '/api/v1/comments.php';*/



        /** This is the good way to iterate the files **/
        \App\Helpers\Routes\RouteHelper::includeRouteFiles(__DIR__. '/api/v1');
    });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//
//
//Route::get('/api',function (Request $request){
//    dump($request);
//   return new \Illuminate\Http\JsonResponse([
//      'data' => 'aaa'
//   ]);
//});




