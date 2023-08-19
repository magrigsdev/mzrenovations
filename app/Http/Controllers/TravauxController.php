<?php

namespace App\Http\Controllers;

use App\Models\Travaux;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class TravauxController extends Controller
{
    //
        //creation
        public function createTravaux(Request $request)
        {
            $request->validate([
                "date_debut" => "required",
                "date_fin" => "required",
                "titre" => "required",
                "description" => "required",
                "montants" => "required",
                "clients_id" => "required",          
            ]);
    
            $travaux = new Travaux();
            $travaux->date_debut = $request->date_debut;
            $travaux->date_fin = $request->date_fin;
            $travaux->titre = $request->titre;
            $travaux->description = $request->description;
            $travaux->montants = $request->description;
            $travaux->clients_id = $request->clients_id;
            $travaux->save();
            
        }
    
        //liste des devis
        public function getListeTravaux()
        {
            //$commentaires = Commentaires::all()->exist();
            //$table = Commentaires::all();
            
            $checkTable = Schema::hasTable('Devis');
    
            if($checkTable){
                $table = Travaux::all();
                $count = Travaux::count();
    
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
    
            
        }
    
        //obtenir un travaux par id
        public function getOneTravaux($id)
        {
            //$client = Clients::where("id", $id)->exist();
            $travaux = Travaux::find($id);
            if($travaux != null)
            {
                return response()->json([
                    "status" => true,
                    "message"=>"success",
                    "data"=>$travaux
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
