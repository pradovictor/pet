<?php

namespace App\Http\Controllers\Action\Aplicativo3\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A3clientepf;
use App\A3clientepfFormulario; 
// use App\A2clientepj;
use App\Http\Requests\ValidateA3clientepfFormulario;

class FormularioController extends Controller{
    
    public function list($clienteID){
        $cliente = A3clientepf::find($clienteID);
        $registros = [];
        if (!empty($cliente)) {
            foreach($cliente->clientesFormulario as $registro) {
                $registros[] =  [
                    "id"=> $registro->id,        
                    "nome" => $registro->nome,
                    // "nome" => $registro->nome."::".url('/action/aplicativo3/paciente/formulario/getbyid')."/".$registro->id,  
                    "descricao" => $registro->descricao, 
                    "actions" => [true, Auth::user()->can('CLIENTE3-FORMULARIO-E'), Auth::user()->can('CLIENTE3-FORMULARIO-R'), false],         
                    // "actions" => [true, true, true, false],         
                ];
            }
        }
        return response()->json($registros);
    }

    public function getById($id){
        $registro = A3clientepfFormulario::find($id);
        if (!empty($registro)) {
            return response()->json([
                "id"=> $registro->id,        
                "nome" => $registro->nome,
                "descricao" => $registro->descricao, 
            ]);
        }
        return response()->json(array('error' => true));
    }


    public function save($clienteId, ValidateA3clientepfFormulario $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            //edição
            if (Auth::user()->can('CLIENTE3-FORMULARIO-E')) {
                $registro = A3clientepfFormulario::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->a3clientepf_id = $clienteId;            
                    $registro->nome = $request->input('nome');
                    $registro->descricao = $request->input('descricao');
                    $registro->update();
                }
            }    
        } else {
            //novo
            if (Auth::user()->can('CLIENTE3-FORMULARIO-A')) {
                $registro = new A3clientepfFormulario($allInputs);
                $registro->a3clientepf_id = $clienteId;               
                $registro->nome = $request->input('nome');
                $registro->descricao = $request->input('descricao');
                $registro->save();
            }    
        }
    }

    public function delete($id) {
        $registro = A3clientepfFormulario::find($id);
        if (!empty($registro)) {       
            // elimina 
            if (Auth::user()->can('CLIENTE3-FORMULARIO-R')) {
                $registro->delete();
                return "true";
            }    
        }
        return "false";
    }

    // save especial - ajax - dentro paciente / edicao / visao geral
    public function save2(Request $request) {
        // print('to aqui ---- entrei');
        $xid = $request->input('xid');
        $xdescricao = $request->input('xdescricao');
        $xnome = $request->input('xnome');
        $registro = A3clientepfFormulario::find($xid);
        // die($xid);
        if(!empty($registro)) {
            // $registro->id = $xid;            
            // $registro->nome = $request->input('nome');
            $registro->descricao = $xdescricao;
            $registro->nome = $xnome;
            $registro->update();
            $arr = array('aa' => $xid , 'bb' => $xdescricao, 'cc' => $xnome);
            // return json_encode(['success' => $xid]);
            return json_encode($arr);
        }
        return json_encode(['success' => 'false']);
    }



}    

