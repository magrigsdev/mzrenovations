<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProfilController extends Controller
{
    //
        //creation
        // public function createProfil(Request $request)
        // {
        //     $request->validate([
        //         "nom" => "required",
        //         "email" => "required|email|unique:Profil",
        //         "sexe" => "required",
        //         "is_admin" => "required",
        //         "tel" => "required",     
        //     ]);
    
        //     $profil = new Profil();
        //     $profil->nom = $request->nom;
        //     $profil->email = $request->email;
        //     $profil->sexe = $request->sexe;
        //     $profil->tel = $request->tel;
        //     $profil->is_admin = $request->is_admin;            
        // }
    
        //liste des devis
        public function getListeProfil()
        {
            //$commentaires = Commentaires::all()->exist();
            //$table = Commentaires::all();
            
            $checkTable = Schema::hasTable('Devis');
    
            if($checkTable){
                $table = Profil::all();
                $count = Profil::count();
    
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
        public function getOneProfil($id)
        {
            //$client = Clients::where("id", $id)->exist();
            $profil = Profil::find($id);
            if($profil != null)
            {
                return response()->json([
                    "status" => true,
                    "message"=>"success",
                    "data"=>$profil
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
