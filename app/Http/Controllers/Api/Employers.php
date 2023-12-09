<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employers as ModelsEmployers;
use Illuminate\Http\Request;

class Employers extends Controller
{
    public function store(Request $request,ModelsEmployers $emp){
        $nom = $request->nom;
        $prenom = $request->prenom ;
        $poste = $request->poste;
        $salaire = $request->salaire;

        if($nom != ""){
            $emp->nom = $nom;
            $emp->prenom = $prenom;
            $emp->poste = $poste;
            $emp->salaire = $salaire;
           $emp->save();

           return response()->json([
                "employers" => $emp,
                "status"=> 200,
           ]);

        }

    }
    public function update(Request $request,ModelsEmployers $emp){

        $nom = $request->nom;
        $prenom = $request->prenom ;
        $poste = $request->poste;
        $salaire = $request->salaire;

        if(ModelsEmployers::find($request->id)){

            $emp->nom = $nom;
            $emp->prenom = $prenom;
            $emp->poste = $poste;
            $emp->salaire = $salaire;

            $val = [
                "nom"=> $nom,
                "prenom"=> $prenom,
                "poste"=> $poste,
                "salaire"=> $salaire,

            ];

            
            ModelsEmployers::where('id',$request->id)->update($val);
            // $emp->();
            // $res = ModelsEmployers::where("id",$request->id)->update([
              
            // ]);
           
            return response()->json([
                'employers'=> $request,
                "rs" => $emp,
                "message"=>"Modification terminé avec succés",
                'status'=>200
            ]);
        }else{
            return response()->json([
                "message"=>"L'id n'existe pas",
                'status' => 401
            ]);
        }
    }

    public function increment($id,$val){
        
        $employers = ModelsEmployers::where("id",$id)->increment("salaire",$val);
        if($employers == 1){

            return response()->json(
                [
                    "employers"=>"la saalire de l' .$id. est incrementé de .$val",
                    "status"=> 401,
                ]
            );
        }
    }
    public function decrement($id,$val){
        
        $employers = ModelsEmployers::where("id",$id)->decrement("salaire",$val);
        if($employers == 1){

            return response()->json(
                [
                    "employers"=>"la salaire de l'' .$id. est decrementé de .$val",
                    "status"=> 401,
                ]
            );
        }
    }

    public function find($id){
        
     
        if(is_numeric($id)){

            
            return response()->json(
                [
                    "employers"=> ModelsEmployers::where("id",$id)->get(),
                    "status"=> 200
                ]
            );
        }else{
            return response()->json(
                [
                    "employers"=>null,
                    "status"=> 401,
                ]
            );
        }
    }

    public function remove($id){
        $res = ModelsEmployers::where('id',$id)->delete();
        return response()->json([
            'resultat'=> "suppression avec succéss",
            "status"=> 200,
        ]);
    }
    
    public function index(){

        // return 'film';
        // $query = ModelsEmployers::whereNotBetween('salaire',[560000,1000000]);
        $employers = ModelsEmployers::all();
        // $employers = $query->get();
        // $employers =  ModelsEmployers::avg('salaire');
        return response()->json(
            [
                "employers" => $employers,
                "status"=>"200"
                ]
        );
    }
}
