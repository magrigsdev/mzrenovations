<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\TravauxController;
use App\Http\Controllers\CommentairesController;
use App\Http\Controllers\UtilisateursController;

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
Route::post('createcommentaire',[CommentairesController::class,"createCommentaire"] );

//clients
Route::get('Listeclients',[ClientsController::class,"getListeClients"] );
Route::get('oneclient/{id}',[ClientsController::class,"getOneClient"] );
Route::post('createclient',[ClientsController::class,"createClient"] );

//devis
Route::get('Listedevis',[DevisController::class,"getListeDevis"] );
Route::get('onedevis/{id}',[DevisController::class,"getOneDevis"] );
Route::post('createdevis',[DevisController::class,"createDevis"] );

//travaux
Route::get('Listetravaux',[TravauxController::class,"getListeTravaux"] );
Route::get('onetravaux/{id}',[TravauxController::class,"getOneTravaux"] );
Route::post('createtravaux',[TravauxController::class,"createTravaux"] );

//profil
Route::get('Listeprofil',[ProfilController::class,"getListeProfil"] );
Route::get('oneprofil/{id}',[ProfilController::class,"getOneProfil"] );
//Route::post('createprofil',[ProfilController::class,"createProfil"] );

//utilisateurs
Route::get('Listeutilisateurs',[UtilisateursController::class,"getListeUtilisateurs"] );
Route::get('oneutilisateurs/{id}',[UtilisateursController::class,"getOneUtilisateurs"] );
//on create un compte utilsateur
Route::post('createutilisateurs',[UtilisateursController::class,"createUtilisateurs"] );

//admin
Route::get('alal',[AdminController::class,"getAdmin"]);
Route::get('alalList',[AdminController::class,"getListAdmin"]);
//admin-2 delete
Route::delete('utilisateur/{id}',[AdminController::class,"delUtilisateur"]);
Route::delete('client/{id}',[AdminController::class,"delClient"]);
Route::delete('devis/{id}',[AdminController::class,"delDevis"]);
Route::delete('travaux/{id}',[AdminController::class,"delTravaux"]);


//----------------------- LOGIN ----------------------------------//
Route::post('login',[LoginController::class,"getLogin"]);
Route::post('logout',[LoginController::class,"getLogout"]);

//mot de pass oublié
Route::get('passwordforget/{mail}',[LoginController::class,"passwordForget"]);
