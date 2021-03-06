<?php

namespace App\Http\Controllers\Action\Aplicativo3\Precadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A3profissional;
use App\Http\Requests\ValidateA3profissional;

class ProfissionalController extends Controller{
    
    public function list(){
        $registros = A3profissional::all();
        $response = [];
        foreach($registros as $registro) {
            $item['id'] =  $registro->id;
            $item['nome'] = $registro->nome;
            if ($registro->cor==='#4CAF50'){
                $item['cor'] = 'Verde';
            }elseif ($registro->cor==='#ff9800') {
                $item['cor'] = 'Laranja';
            }elseif ($registro->cor==='#ffff00') {
                $item['cor'] = 'Amarelo';    
            }elseif ($registro->cor==='#f44336') {
                $item['cor'] = 'Vermelho';
            }elseif ($registro->cor==='#ee82ee') {
                $item['cor'] = 'Violeta';
            }elseif ($registro->cor==='#4169e1') {
                $item['cor'] = 'Anil';
            }elseif ($registro->cor==='#2196F3') {
                $item['cor'] = 'Azul';
            }  
            $item['actions'] = [Auth::user()->can('PRECADASTRO3-PROFISSIONAL-A'), Auth::user()->can('PRECADASTRO3-PROFISSIONAL-E'), Auth::user()->can('PRECADASTRO3-PROFISSIONAL-R'), Auth::user()->can('PRECADASTRO3-PROFISSIONAL-V')];
            if (Auth::user()->can('PRECADASTRO3-PROFISSIONAL-A') || Auth::user()->can('PRECADASTRO3-PROFISSIONAL-E') || Auth::user()->can('PRECADASTRO3-PROFISSIONAL-R') || Auth::user()->can('PRECADASTRO3-PROFISSIONAL-V')) {
                $response[] = $item;
            }
        }
        return json_encode($response);
     }


    public function delete($id){
        $registro = A3profissional::find($id);
        if (!empty($registro)) {
            if (Auth::user()->can('PRECADASTRO3-PROFISSIONAL-R')) {
                $registro->delete();
                return "true";
            }    
        }
        return "false";
    }

    public function getById($id) {
        $registro = A3profissional::find($id);
        if (!empty($registro)) {
            return response()->json($registro);
        }
        return response()->json(array('error' => true));
    }

    public function save(ValidateA3profissional $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            if (Auth::user()->can('PRECADASTRO3-PROFISSIONAL-E')) {
                $registro = A3profissional::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->update($allInputs);
                }
            }    
        } else {
            if (Auth::user()->can('PRECADASTRO3-PROFISSIONAL-A')) {
                $registro = new A3profissional($allInputs);
                $registro->save();
            }
        }
    }
    
}    

