<?php

namespace App\Http\Controllers\Action\Aplicativo4\Precadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A4vacina;
use App\Http\Requests\ValidateA4vacina;

class VacinaController extends Controller{
    
    public function list(){
        $registros = A4vacina::all();
        $response = [];
        foreach($registros as $registro) {
            $item['id'] =  $registro->id;
            $item['nome'] = $registro->nome;
            $item['dose'] = $registro->dose;
            $item['periodo'] = $registro->periodo;
            $item['actions'] = [Auth::user()->can('PRECADASTRO4-A'), Auth::user()->can('PRECADASTRO4-E'), Auth::user()->can('PRECADASTRO4-R'), Auth::user()->can('PRECADASTRO4-V')];
            if (Auth::user()->can('PRECADASTRO4-A') || Auth::user()->can('PRECADASTRO4-E') || Auth::user()->can('PRECADASTRO4-R') || Auth::user()->can('PRECADASTRO4-V')) {
                $response[] = $item;
            }
        }
        return json_encode($response);
     }


    public function delete($id){
        $registro = A4vacina::find($id);
        if (!empty($registro)) {
            if (Auth::user()->can('PRECADASTRO4-R')) {
                $registro->delete();
                return "true";
            }    
        }
        return "false";
    }

    public function getById($id) {
        $registro = A4vacina::find($id);
        if (!empty($registro)) {
            return response()->json($registro);
        }
        return response()->json(array('error' => true));
    }

    public function save(ValidateA4vacina $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            if (Auth::user()->can('PRECADASTRO4-E')) {
                $registro = A4vacina::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->update($allInputs);
                }
            }    
        } else {
            if (Auth::user()->can('PRECADASTRO4-A')) {
                $registro = new A4vacina($allInputs);
                $registro->save();
            }
        }
    }
    
}    

