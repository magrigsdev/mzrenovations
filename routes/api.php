<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevisController;
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
Route::get('Listecommentaires',[CommentairesController::class,"getListeCommentaires"] );
Route::post('createCommentaire',[CommentairesController::class,"createCommentaire"] );

//clients
Route::get('Listeclients',[ClientsController::class,"getListeClients"] );
Route::get('oneclient/{id}',[ClientsController::class,"getOneClient"] );
Route::post('createclient',[ClientsController::class,"createClient"] );

//devis
Route::get('Listedevis',[DevisController::class,"getListeDevis"] );
Route::get('onedevis/{id}',[DevisController::class,"getOneDevis"] );
Route::post('createDevis',[DevisController::class,"createDevis"] );

//