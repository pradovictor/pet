<?php

namespace App\Http\Controllers\Action\Aplicativo3\Calendario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//
use Illuminate\Support\Facades\DB;
//
use App\A3agenda;
use App\A3clientepf;
use App\A3profissional;
use App\Http\Requests\ValidateA3agenda;

class AgendaController extends Controller{
    
    public function list(){
        // $registros = DB::table('a3agenda')->select('*')->get();
        // foreach(Rpi::where('prazo', '>=', $dias2)->get() as $rpi) {
            // $dias = request()->diasVencimento;
            // $dias2 = substr($dias,6,4) . "-" . substr($dias,3,2) . "-" . substr($dias,0,2); // formato > aaaa-mm-dd    
            $periodo = request()->periodo;
            $response = [];
            // $registros = A3agenda::all();
        // $response = [];
        if (!empty($periodo))
        {
            $datainicio = substr($periodo,0,10);
            $partes = explode("/",$datainicio);
            $a_datainicio = $partes[2] . "-" . $partes[1] . "-" . $partes[0];
            $datafinal = substr($periodo,13,10);
            $partes = explode("/",$datafinal);
            $a_datafinal = $partes[2] . "-" . $partes[1] . "-" . $partes[0];
            // filtra conforme tipo da data
            // print_r($a_datainicio);
            // print_r('------');
            // print_r($a_datafinal);
            // print_r('------');
            // die('-------------2');
            $registros = A3agenda::where('data_inicio','>=',$a_datainicio)->where('data_fim','<=',$a_datafinal)->orderBy('data_inicio','asc')->orderBy('hora_inicio','asc')->get();
        }    
        else{
            // $registros = A3agenda::all(); cancelado geral - pegando todos mas ordenados por data e hora
            $registros = A3agenda::where('data_inicio','>','2010-01-01')->orderBy('data_inicio','asc')->orderBy('hora_inicio','asc')->get();
        }       
        foreach($registros as $registro) {
            $item['id'] =  $registro->id;
            $item['titulo'] = $registro->titulo;
            $item['a3clientepf_id'] = $registro->a3clientepf_id;
            if (!empty($registro->a3clientepf_id)){
                $item['cliente'] = (!empty($registro->cliente->nome) ? $registro->cliente->nome : '');
            }    
            else{
                $item['cliente'] = '** '.$registro->titulo;
            }
            // $item['profissional'] = $registro->a3profissional_id;
            $item['profissional'] = (!empty($registro->profissional->nome) ? $registro->profissional->nome : '');
            // cores
            // success  - #4CAF50 - Aguardando sala
            // warning  - #ff9800 - Agendado
            // danger   - #f44336 - Não compareceu
            // info     - #2196F3 - Sem vinculo (nao precisa - fixo na carga do calendario)
            if ($registro->cor==='#4CAF50'){
                $item['cor'] = 'Aguardando na sala';
            }elseif ($registro->cor==='#ff9800') {
                $item['cor'] = 'Agendado';
            }elseif ($registro->cor==='#f44336') {
                $item['cor'] = 'Não compareceu';
            }elseif ($registro->cor==='#2196F3') {
                $item['cor'] = 'Sem vinculo';
            }          
            // $item['cor'] = $registro->cor;
            // datas
            $item['data_inicio'] = $registro->data_inicio;
            $item['data_fim'] = $registro->data_fim;
            // horas
            if (!empty($registro->hora_inicio)) {
                $xhora_inicio=substr($registro->hora_inicio,0,strlen($registro->hora_inicio)-3);
                // $item['hora_inicio'] = $xhora_inicio;
                $horarioi = $xhora_inicio;
            }
            else {
                // $item['hora_inicio'] = $registro->hora_inicio;
                $horarioi = $registro->hora_inicio;
            }

            if (!empty($registro->hora_fim)) {
                $xhora_fim=substr($registro->hora_fim,0,strlen($registro->hora_fim)-3);
                // $item['hora_fim'] = $xhora_fim;
                $horariof = $xhora_fim;
            }   
            else {
                // $item['hora_fim'] = $registro->hora_fim;
                $horariof = $registro->hora_fim;
            }           
            $item['horario'] = $horarioi.' - '.$horariof;  
            // $item['actions'] = [true,true,true,true];
            // $response[] = $item;
            $item['actions'] = [Auth::user()->can('AGENDA3-A'), Auth::user()->can('AGENDA3-E'), Auth::user()->can('AGENDA3-R'), Auth::user()->can('AGENDA3-V')];
            if (Auth::user()->can('AGENDA3-A') || Auth::user()->can('AGENDA3-E') || Auth::user()->can('AGENDA3-R') || Auth::user()->can('AGENDA3-V')) {
                $response[] = $item;
            }
        }
        return json_encode($response);
     }

    public function delete($id){
        $registro = A3agenda::find($id);
        if (!empty($registro)) {
            if (Auth::user()->can('AGENDA3-R')) {
                $registro->delete();
                return "true";
            }    
        }
        return "false";
    }

    // public function getById($id) {
    //     $registro = A3agenda::find($id);
    //     if (!empty($registro)) {
    //         return response()->json($registro);
    //     }
    //     return response()->json(array('error' => true));
    // }

    public function getById($id){
        $registro = A3agenda::find($id);
        if (!empty($registro)) {
            // foramatadno horas
            if (!empty($registro->hora_inicio)) {
                $xhora_inicio=substr($registro->hora_inicio,0,strlen($registro->hora_inicio)-3);
            }
            else {
                $xhora_inicio = $registro->hora_inicio;
            }    

            if (!empty($registro->hora_fim)) {
                $xhora_fim=substr($registro->hora_fim,0,strlen($registro->hora_fim)-3);
            }
            else {
                $xhora_fim = $registro->hora_fim;
            }    
            // retorno do registro
            return response()->json([
                "id"=> $registro->id,            
                "a3clientepf_id" => $registro->a3clientepf_id,
                "a3profissional_id" => $registro->a3profissional_id,
                "titulo" => $registro->titulo,
                "data_inicio" => $registro->data_inicio,
                "cor" => $registro->cor,
                "data_fim" => $registro->data_fim,
                "hora_inicio" => $xhora_inicio,
                "hora_fim" => $xhora_fim,
            ]);
        }
        return response()->json(array('error' => true));
    }





    public function save(ValidateA3agenda $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            if (Auth::user()->can('AGENDA3-E')) {
                $registro = A3agenda::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->update($allInputs);
                }
            }    
        } else {
            if (Auth::user()->can('AGENDA3-A')) {
                $registro = new A3agenda($allInputs);
                $registro->save();
            }
        }
    }
    
}    

