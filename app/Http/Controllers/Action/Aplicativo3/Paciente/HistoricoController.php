<?php

namespace App\Http\Controllers\Action\Aplicativo3\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A3clientepf;
use App\A3clientepfHistorico; 
// use App\A2clientepj;
use App\Http\Requests\ValidateA3clientepfHistorico;

class HistoricoController extends Controller{
    
    public function list($clienteID){
        $cliente = A3clientepf::find($clienteID);
        $registros = [];
        if (!empty($cliente)) {
            foreach($cliente->clientesHistorico as $registro) {
                if ($registro->altura<>0) {
                    $imc = $registro->peso/(($registro->altura*$registro->altura)/10000);
                }
                else{
                    $imc = null;
                }
                $registros[] =  [
                    "id"=> $registro->id,        
                    "historico" => $registro->historico,
                    "receita" => $registro->receita,
                    "queixa" => $registro->queixa,
                    "data" => $registro->data, 
                    "peso" => $registro->peso,
                    "imc" => number_format($imc,2),
                    "altura" => $registro->altura,
                    "pa" => $registro->pa,
                    "fc" => $registro->fc,
                    "temperatura" => $registro->temperatura,
                    "actions" => [true, Auth::user()->can('CLIENTE3-HISTORICO-E'), Auth::user()->can('CLIENTE3-HISTORICO-R'), false],         
                    // "actions" => [true, true, true, false],         
                ];
            }
        }
        return response()->json($registros);
    }

    public function getById($id){
        $registro = A3clientepfHistorico::find($id);
        if (!empty($registro)) {
            if ($registro->altura<>0) {
                $imc = $registro->peso/(($registro->altura*$registro->altura)/10000);
            }
            else{
                $imc = null;
            }
            return response()->json([
                "id"=> $registro->id,       
                "historico" => $registro->historico,
                "receita" => $registro->receita,
                "queixa" => $registro->queixa,
                "data" => $registro->data,    
                "peso" => $registro->peso,    
                "imc" => number_format($imc,2),
                "altura" => $registro->altura,
                "pa" => $registro->pa,
                "fc" => $registro->fc,
                "temperatura" => $registro->temperatura,
            ]);
        }
        return response()->json(array('error' => true));
    }


    public function save($clienteId, ValidateA3clientepfHistorico $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            //edição
            if (Auth::user()->can('CLIENTE3-HISTORICO-E')) {
                $registro = A3clientepfHistorico::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->a3clientepf_id = $clienteId;            
                    $registro->historico = $request->input('historico');
                    $registro->receita = $request->input('receita');
                    $registro->queixa = $request->input('queixa');
                    $registro->data = $request->input('data');
                    $registro->peso = $request->input('peso');
                    $registro->altura = $request->input('altura');
                    $registro->pa = $request->input('pa');
                    $registro->fc = $request->input('fc');
                    $registro->temperatura = $request->input('temperatura');
                    $registro->update();
                }
            }    
        } else {
            //novo
            if (Auth::user()->can('CLIENTE3-HISTORICO-A')) {
                $registro = new A3clientepfHistorico($allInputs);
                $registro->a3clientepf_id = $clienteId;               
                $registro->historico = $request->input('historico');
                $registro->receita = $request->input('receita');
                $registro->queixa = $request->input('queixa');
                $registro->data = $request->input('data');
                $registro->peso = $request->input('peso');
                $registro->altura = $request->input('altura');
                $registro->pa = $request->input('pa');
                $registro->fc = $request->input('fc');
                $registro->temperatura = $request->input('temperatura');
                $registro->save();
            }    
        }
    }

    public function delete($id) {
        $registro = A3clientepfHistorico::find($id);
        if (!empty($registro)) {       
            // elimina historico
            if (Auth::user()->can('CLIENTE3-HISTORICO-R')) {
                $registro->delete();
                return "true";
            }    
        }
        return "false";
    }

    // save especial - ajax - dentro paciente / edicao / visao geral
    public function save2(Request $request) {
        // print('to aqui ---- entrei');
        $ideform = $request->input('ideform');
        $idcliente = $request->input('idcliente');
        // print($ideform);
        $ehistorico = $request->input('ehistorico');
        $ealtura = $request->input('ealtura');
        $epeso = $request->input('epeso');
        $epa = $request->input('epa');
        $efc = $request->input('efc');
        $etemperatura = $request->input('etemperatura');
        $edata = $request->input('edata');
        $ereceita = $request->input('ereceita');
        $registro = A3clientepfHistorico::find($ideform);
        // die($ideform);
        if(!empty($registro)) {  // EDICAO 
            $registro->historico = $ehistorico;
            $registro->altura = $ealtura;
            $registro->peso = $epeso;
            $registro->pa = $epa;
            $registro->fc = $efc;
            $registro->temperatura = $etemperatura;
            $registro->historico = $ehistorico;
            $registro->data = $edata;
            $registro->receita = $ereceita;
            $registro->update();
            $arr = array('tipo' => 'edita', 'aa' => $ideform , 'bb' => $ehistorico, 'cc' => $epeso, 'dd' => $ealtura, 'ee' => $epa, 'ff' => $efc, 'gg' => $etemperatura, 'ii' => $edata, 'jj' => $ereceita);
            return json_encode($arr);
        }elseif (empty($ideform)){  //  VALOR NULO - NOVO REGISTRO
            $registro = new A3clientepfHistorico;
            $registro->a3clientepf_id = $idcliente;
            $registro->historico = $ehistorico;
            $registro->altura = $ealtura;
            $registro->peso = $epeso;
            $registro->pa = $epa;
            $registro->fc = $efc;
            $registro->temperatura = $etemperatura;
            $registro->historico = $ehistorico;
            $registro->data = $edata;
            $registro->receita = $ereceita;
            $registro->save();
            $arr = array('tipo' => 'novo');
            return json_encode($arr);
        }
        return json_encode(['success' => 'false']);
    }

}    

