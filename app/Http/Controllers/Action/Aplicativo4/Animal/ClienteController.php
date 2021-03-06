<?php

namespace App\Http\Controllers\Action\Aplicativo4\Animal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A4animal;
use App\Http\Requests\ValidateA4animal;

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
          $registros = A4animal::all();
        }
        else{
            $registros = A4animal::where('nome','>=', $nome)->where('nome','<=',$nome.'z')->orderBy('nome','asc')->get();
        }
        $response = [];
        foreach($registros as $registro) {
            $item['id'] =  $registro->id;
            $item['nome'] = $registro->nome;
            $item['proprietario'] = (!empty($registro->proprietario->nome) ? $registro->proprietario->nome : '');
            $item['actions'] = [true,true,true,true];
            $response[] = $item;
        }
        return json_encode($response);
    }

    public function delete($id){
        $registro = A4animal::find($id);
        if (!empty($registro)) {
            if (Auth::user()->can('ANIMAL-R')) {
                $registro->delete();
                return "true";
            }    
        }
        return "false";
    }

    public function getById($id) {
        $registro = A4animal::find($id);
        if (!empty($registro)) {
            return response()->json($registro);
        }
        return response()->json(array('error' => true));
    }

    public function save(ValidateA4animal $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            if (Auth::user()->can('ANIMAL-E')) {
                $registro = A4animal::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->update($allInputs);
                }
            }    
        } else {
            if (Auth::user()->can('ANIMAL-A')) {
                $registro = new A4animal($allInputs);
                $registro->save();
            }
        }
    }

    // verifica se pode salvar -nome do bicho e proprietario existente
    public function verificasave(Request $request) {
        // print('to aqui ---- entrei');
        $xid = $request->input('xid');
        $xnome = $request->input('xnome');
        // print_r('-----');
        // print_r($xid);
        // print_r('----');
        // print_r($xnome);
        // die('aaaaaa');
        $registros = A4animal::where('nome','=', $xnome)->where('a4proprietario_id','=',$xid)->get();
        $aa =count($registros);
        // print_r('-num---');
        // print_r($aa);
        // print_r('----');
        // print_r($registros);
        // print_r('----');
        // die('bbbbb');
        if($aa > 0) {
            return json_encode(['success' => 'nao']);
        }else {
            return json_encode(['success' => 'sim']);
        }
    }


    
}    

