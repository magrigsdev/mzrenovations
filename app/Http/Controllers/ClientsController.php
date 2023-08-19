<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ClientsController extends Controller
{
    //

    public function createClient(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "email" => "required|email|unique:clients",
            "sexe" => "required",
            "tel" => "required",
            "adresse" => "required"
        ]);

        $client = new Clients();
        $client->nom = $request->nom;
        $client->email = $request->email;
        $client->sexe = $request->sexe;
        $client->tel = $request->tel;
        $client->adresse = $request->adresse;
    }

    public function getListeClients()
    {
        
        
        $checkTable = Schema::hasTable('Clients');

        if($checkTable){
            $table = Clients::all();
            $count = Clients::count();

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

    public function getOneClient($id)
    {
        //$client = Clients::where("id", $id)->exist();
        $client = Clients::find($id);
        if($client != null)
        {
            return response()->json([
                "status" => true,
                "message"=>"success",
                "data"=>$client
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
