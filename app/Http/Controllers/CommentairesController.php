<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Commentaires;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CommentairesController extends Controller
{
    //
    public function getCommentaires()
    {
        //$commentaires = Commentaires::all()->exist();
        //$table = Commentaires::all();
        
        $checkTable = Schema::hasTable('Commentaires');

        if($checkTable){
            $table = Commentaires::all();
            $count = Commentaires::count();

            if($count>0){
                return response()->json([
                    'status'=>true,
                    'message'=>'sucess',
                    'data'=>$table,
                ],200);
            }
            else{
                return response()->json([
                    'status'=>false,
                    'message'=>"aucune données",                    
                ],404);
            }
            
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>"la table n'existe pas",
                
            ],404);
        }

        //return response()->json($commentaires);
    }

    public function createCommentaire(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "email" => "required|email|unique:clients",
            "message" => "required",
            
        ]);

        $commentaire = new Commentaires();
        $commentaire->nom = $request->nom;
        $commentaire->email = $request->email;
        $commentaire->message = $request->sexe;
        
    }
    
}
