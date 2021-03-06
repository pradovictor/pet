<?php

namespace App\Http\Controllers\Action\Aplicativo4\Proprietario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A4proprietario;
use App\Http\Requests\ValidateA4proprietario;

class ClienteController extends Controller{
    
    public function list($nome){
        // verificando partes da palavra >> separador _
        $partes = explode("_",$nome);
        $num = count($partes);
        if ($num>1) {
            $nome='';
            foreach ($partes as $aa) {
                $nome = $nome . $aa . ' ';
            }
            $nome = substr($nome, 0 , strlen($nome)-1);
        }

        if ($nome==='*') {
          $registros = A4proprietario::all();
        }
        else{
            $registros = A4proprietario::where('nome','>=', $nome)->where('nome','<=',$nome.'z')->orderBy('nome','asc')->get();
        }
        // $registros = A3animal::where('nome','=',$nome)->orderBy('nome','asc')->get();
        

        // $registros = A4proprietario::all();

        $response = [];
        foreach($registros as $registro) {
            $item['id'] =  $registro->id;
            $item['nome'] = $registro->nome;
            $item['cpf'] = $registro->cpf;
            $item['actions'] = [true,true,true,true];
            $response[] = $item;
        }
        return json_encode($response);
    }

    public function delete($id){
        $registro = A4proprietario::find($id);
        if (!empty($registro)) {
            if (Auth::user()->can('PROPRIETARIO-R')) {
                $registro->delete();
                return "true";
            }    
        }
        return "false";
    }

    public function getById($id) {
        $registro = A4proprietario::find($id);
        if (!empty($registro)) {
            return response()->json($registro);
        }
        return response()->json(array('error' => true));
    }

    public function save(ValidateA4proprietario $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            if (Auth::user()->can('PROPRIETARIO-E')) {
                $registro = A4proprietario::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->update($allInputs);
                }
            }    
        } else {
            if (Auth::user()->can('PROPRIETARIO-A')) {
                $registro = new A4proprietario($allInputs);
                $registro->save();
            }
        }
    }
    
}    

