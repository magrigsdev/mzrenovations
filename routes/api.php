<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CommentairesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//route
//commentaires
Route::get('commentaires',[CommentairesController::class,"getCommentaires"] );
Route::post('createCommentaire',[CommentairesController::class,"createCommentaire"] );

//client
Route::get('clients',[ClientsController::class,"getClients"] );
Route::get('oneclient/{id}',[ClientsController::class,"getOneClient"] );
Route::post('createclient',[ClientsController::class,"createClient"] );


