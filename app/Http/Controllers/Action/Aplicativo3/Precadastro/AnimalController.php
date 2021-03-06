<?php

namespace App\Http\Controllers\Action\Aplicativo3\Precadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A3animal;
use App\Http\Requests\ValidateA3animal;

class AnimalController extends Controller{
    
    public function list($nome){
        // die($nome);
        // $registros = A3agenda::where('data_inicio','>=',$a_datainicio)->where('data_fim','<=',$a_datafinal)->orderBy('data_inicio','asc')->orderBy('hora_inicio','asc')->get();
        
        $registros = A3animal::where('nome','>=', $nome)->where('nome','<=',$nome.'z')->orderBy('nome','asc')->get();
        // $registros = A3animal::where('nome','=',$nome)->orderBy('nome','asc')->get();
        

        // $registros = A3animal::all();

        $response = [];
        foreach($registros as $registro) {
            $item['id'] =  $registro->id;
            $item['nome'] = $registro->nome;
            $item['sexo'] = $registro->sexo;
            $item['pedigree'] = $registro->sexo;
            $item['historico'] = $registro->historico;
            $item['proprietario'] = $registro->proprietario_id;
            // $item['actions'] = [true,true,true,true];
            // $response[] = $item;
            $item['actions'] = [Auth::user()->can('PRECADASTRO3-REMEDIO-A'), Auth::user()->can('PRECADASTRO3-REMEDIO-E'), Auth::user()->can('PRECADASTRO3-REMEDIO-R'), Auth::user()->can('PRECADASTRO3-REMEDIO-V')];
            if (Auth::user()->can('PRECADASTRO3-REMEDIO-A') || Auth::user()->can('PRECADASTRO3-REMEDIO-E') || Auth::user()->can('PRECADASTRO3-REMEDIO-R') || Auth::user()->can('PRECADASTRO3-REMEDIO-V')) {
                $response[] = $item;
            }
        }
        return json_encode($response);
     }


    public function delete($id){
        $registro = A3animal::find($id);
        if (!empty($registro)) {
            if (Auth::user()->can('PRECADASTRO3-REMEDIO-R')) {
                $registro->delete();
                return "true";
            }    
        }
        return "false";
    }

    public function getById($id) {
        $registro = A3animal::find($id);
        if (!empty($registro)) {
            return response()->json($registro);
        }
        return response()->json(array('error' => true));
    }

    public function save(ValidateA3animal $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            if (Auth::user()->can('PRECADASTRO3-REMEDIO-E')) {
                $registro = A3animal::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->update($allInputs);
                }
            }    
        } else {
            if (Auth::user()->can('PRECADASTRO3-REMEDIO-A')) {
                $registro = new A3animal($allInputs);
                $registro->save();
            }
        }
    }
    
}    

