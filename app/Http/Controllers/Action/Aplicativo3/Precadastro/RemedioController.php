<?php

namespace App\Http\Controllers\Action\Aplicativo3\Precadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A3remedio;
use App\Http\Requests\ValidateA3remedio;

class RemedioController extends Controller{
    
    public function list(){
        $registros = A3remedio::all();
        $response = [];
        foreach($registros as $registro) {
            $item['id'] =  $registro->id;
            $item['nome'] = $registro->nome;
            $item['caixa'] = $registro->caixa;
            // $item['nome'] = $registro->nome."::".url("{{config('app.url')}}/action/aplicativo3/precadastro/formulario/editar/1");  
            // $item['nome'] = $registro->nome."::".url('/aplicativo3/paciente/viewext/10');  
            // $item['descricao'] = substr($registro->descricao,0,1100);
            $item['descricao'] = $registro->descricao;
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
        $registro = A3remedio::find($id);
        if (!empty($registro)) {
            if (Auth::user()->can('PRECADASTRO3-REMEDIO-R')) {
                $registro->delete();
                return "true";
            }    
        }
        return "false";
    }

    public function getById($id) {
        $registro = A3remedio::find($id);
        if (!empty($registro)) {
            return response()->json($registro);
        }
        return response()->json(array('error' => true));
    }

    public function save(ValidateA3remedio $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            if (Auth::user()->can('PRECADASTRO3-REMEDIO-E')) {
                $registro = A3remedio::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->update($allInputs);
                }
            }    
        } else {
            if (Auth::user()->can('PRECADASTRO3-REMEDIO-A')) {
                $registro = new A3remedio($allInputs);
                $registro->save();
            }
        }
    }
    
}    

