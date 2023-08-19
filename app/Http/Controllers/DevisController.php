<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DevisController extends Controller
{
    //creation
    public function createDevis(Request $request)
    {
        $request->validate([
            "date_debut" => "required",
            "date_fin" => "required|email|unique:Devis",
            "description" => "required",
            "montants" => "required",
            "valider" => "required",
            "clients_id" => "required",          
        ]);

        $devis = new Devis();
        $devis->date_debut = $request->date_debut;
        $devis->date_fin = $request->date_fin;
        $devis->description = $request->description;
        $devis->montants = $request->description;
        $devis->valider = $request->valider;
        $devis->clients_id = $request->clients_id;
        
    }

    //liste des devis
    public function getListeDevis()
    {
        //$commentaires = Commentaires::all()->exist();
        //$table = Commentaires::all();
        
        $checkTable = Schema::hasTable('Devis');

        if($checkTable){
            $table = Devis::all();
            $count = Devis::count();

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

    //obtenir un devis par id
    public function getOneDevis($id)
    {
        //$client = Clients::where("id", $id)->exist();
        $devis = Devis::find($id);
        if($devis != null)
        {
            return response()->json([
                "status" => true,
                "message"=>"success",
                "data"=>$devis
            ],200);
        }
        else
        {
            return response()->json([
                "status" => false,
                "message"=>"aucune donnée trouvé",
                
            ], 404);
        }

    }
    
}
