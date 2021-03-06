<?php

namespace App\Http\Controllers\Action\Aplicativo4\Animal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A4animal;
use App\A4animalPeso; 
// use App\A2clientepj;
use App\Http\Requests\ValidateA4animalPeso;

class PesoController extends Controller{
    
    public function list($clienteID){
        $cliente = A4animal::find($clienteID);
        $registros = [];
        if (!empty($cliente)) {
            foreach($cliente->clientesPeso as $registro) {
                $registros[] =  [
                    "id"=> $registro->id,        
                    "data" => $registro->data,
                    // "nome" => $registro->nome."::".url('/action/aplicativo3/paciente/formulario/getbyid')."/".$registro->id,  
                    "peso" => $registro->peso, 
                    "actions" => [true, Auth::user()->can('ANIMAL-E'), Auth::user()->can('ANIMAL-R'), false],         
                    // "actions" => [true, true, true, false],         
                ];
            }
        }
        return response()->json($registros);
    }

    public function getById($id){
        $registro = A4animalPeso::find($id);
        if (!empty($registro)) {
            return response()->json([
                "id"=> $registro->id,        
                "data" => $registro->data,
                "peso" => $registro->peso, 
            ]);
        }
        return response()->json(array('error' => true));
    }


    public function save($clienteId, ValidateA4animalPeso $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            //edição
            if (Auth::user()->can('ANIMAL-E')) {
                $registro = A4animalPeso::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->a4animal_id = $clienteId;            
                    $registro->data = $request->input('data');
                    $registro->peso = $request->input('peso');
                    $registro->update();
                }
            }    
        } else {
            //novo
            if (Auth::user()->can('ANIMAL-A')) {
                $registro = new A4animalPeso($allInputs);
                $registro->a4animal_id = $clienteId;               
                $registro->data = $request->input('data');
                $registro->peso = $request->input('peso');
                $registro->save();
            }    
        }
    }

    public function delete($id) {
        $registro = A4animalPeso::find($id);
        if (!empty($registro)) {       
            // elimina 
            if (Auth::user()->can('ANIMAL-R')) {
                $registro->delete();
                return "true";
            }    
        }
        return "false";
    }

}    

