<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Profil;
use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UtilisateursController extends Controller
{
    //
    
        //creation
        public function createUtilisateurs(Request $request)
        {
            $request->validate([
                "nom" => "required",
                "email" => "required|email|unique:Profil",
                "sexe" => "required",
                "is_admin" => "required",
                "tel" => "required", 
                "motpass" => "required"    
            ]);
    
            $profil = new Profil();
            $profil->nom = $request->nom;
            $profil->email = $request->email;
            $profil->sexe = $request->sexe;
            $profil->tel = $request->tel;
            $profil->is_admin = $request->is_admin; 
            $profil->save();//enregistrer
            
            //on enregistrements utilisateurs
            //1-on recupere id grace a email
                $myprofil  = Profil::where('email',$profil->email)->first();
                $id = $myprofil->id;
                $nom = $myprofil->nom;
                $email = $myprofil->email;
                $motepasse = $request->password;
                $motepasse = Hash::make($motepasse);
            
            //2- on enregistrement
            if($request->is_admin == "false"){
                //on verifier si cet  mail existe deja
                if(Utilisateurs::where('email',$email)->exist())
                {
                    return response()->json([
                        'status'=>false,
                        'message'=>"cette email existe déjà",    
                    ],404);
                }
                else{
                    //2-1 utilisateurs
                    $user = new Utilisateurs();
                    $user->nom = $nom;
                    $user->email = $email;
                    $user->motpasse = $motepasse;
                    $user->profil_id = $id;
                    $user->save();

                    return response()->json([
                        'status'=>true,
                        'message'=>"utilisateur enregistré",    
                    ],200);
                }
            }
            else{
                //enregistrer un admin
                 //2-1 utilisateurs
                 $user = new Admin();
                 $user->nom = $nom;
                 $user->email = $email;
                 $user->motpasse = $motepasse;
                 $user->profil_id = $id;
                 $user->save();

                 return response()->json([
                     'status'=>true,
                     'message'=>"admin enregistré",    
                 ],200);
            }
        }

        //liste des devis getListeUtilisateurs
        public function getListeUtilisateurs()
        {
            //$commentaires = Commentaires::all()->exist();
            //$table = Commentaires::all();
            
            $checkTable = Schema::hasTable('Utilisateurs');
    
            if($checkTable){
                $table = Utilisateurs::all();
                $count = Utilisateurs::count();
    
                if($count>0){
                    return response()->json([
                        'status'=>true,
                        'message'=>'success',
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
        public function getOneUtilisateurs($id)
        {
            //$client = Clients::where("id", $id)->exist();
            $user = Utilisateurs::find($id);
            if($user != null)
            {
                return response()->json([
                    "status" => true,
                    "message"=>"success",
                    "data"=>$user
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
