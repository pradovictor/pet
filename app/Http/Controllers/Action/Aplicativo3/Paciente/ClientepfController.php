<?php

namespace App\Http\Controllers\Action\Aplicativo3\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A3agenda;
use App\A3clientepf;
use App\A3formulario;
use App\A3clientepfFormulario;
use App\A3clientepfHistorico;
use App\A3clientepfInfodocumento;
use App\A3clientepfDocumento;
use App\Http\Requests\ValidateA3clientepf;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use App\PIPesquisador;


class ClientepfController extends Controller{
    
    public function list($nome){
        // die('=============================>>>zzzzzzzzzzzzzzzzzz');
        // verificando partes da palavra >> separador _
// die($nome);
        $partes = explode("-",$nome);
        $num = count($partes);
        if ($num>1) {
            $nome='';
            foreach ($partes as $aa) {
                $nome = $nome . $aa . ' ';
            }
            $nome = substr($nome, 0 , strlen($nome)-1);
        }

        if ($nome==='*') {
          $registros = A3clientepf::all();
        }
        else{
            $registros = A3clientepf::where('nome','>=', $nome)->where('nome','<=',$nome.'}')->orderBy('nome','asc')->get();
            // $registros = A3clientepf::where('nome','>=', $nome)->orderBy('nome','asc')->get();
        }
        //
        $response = [];
        $acao = [Auth::user()->can('CLIENTE3-A'), Auth::user()->can('CLIENTE3-E'), Auth::user()->can('CLIENTE3-R'), Auth::user()->can('CLIENTE3-V')];
        foreach($registros as $pesquisador){
            $item['id'] = $pesquisador->id;
            $item['cpf'] = $pesquisador->cpf;
            $item['nome'] = $pesquisador->nome;  
            $item['telefone'] = $pesquisador->telefone;  
            $item['email'] = $pesquisador->email;  
            $item['cep'] = $pesquisador->cep;  
            $item['endereco'] = $pesquisador->endereco;  
            $item['bairro'] = $pesquisador->bairro;  
            $item['cidade'] = $pesquisador->cidade;  
            $item['estado'] = $pesquisador->estado;  
            $item['rg'] = $pesquisador->rg;  
            $item['anotacao_geral'] = $pesquisador->anotacao_geral;  
            $item['actions'] = $acao;
            $response[] = $item;
            // $item['actions'] = [Auth::user()->can('CLIENTE3-A'), Auth::user()->can('CLIENTE3-E'), Auth::user()->can('CLIENTE3-R'), Auth::user()->can('CLIENTE3-V')];
            // if (Auth::user()->can('CLIENTE3-A') || Auth::user()->can('CLIENTE3-E') || Auth::user()->can('CLIENTE3-R') || Auth::user()->can('CLIENTE3-V')) {
            //     $response[] = $item;
            // }
        }
       return json_encode($response);
    }
 
   
    public function delete($id){
        // die('zzzzzzzzzbbbbbbbbbbbbb');
        $cliente = A3clientepf::find($id);
        if (!empty($cliente)) {
            $nome = $cliente->nome;
            // *** TODO ELIMINAR TODOS SUB GRUPOS *************r
            // if (0 < sizeof($pesquisador->pipesquisador)){
            //     return "Não é possivel eliminar pesquisador - Pesquisador existente em Gestão da Tecnologia - Propriedade Intelectual   ";
            // }
                
            // elimina evolucao / historico   
            $registros = A3clientepfHistorico::where('a3clientepf_id','=',$id)->get();
            if (!empty($registros)) {
                foreach($registros as $registro) {
                    $registro->delete();
                }
            }
            // elimina formularios   
            $registros = A3clientepfFormulario::where('a3clientepf_id','=',$id)->get();
            if (!empty($registros)) {
                foreach($registros as $registro) {
                    $registro->delete();
                }
            }
            // projeto - anexos, documentos  e registros de documentos na tabela - anexo1 
            $ci1documentos = A3clientepfInfodocumento::where('a3clientepf_id','=',$id)->get();
            if (!empty($ci1documentos)) {
                foreach($ci1documentos as $ci1documento) {
                    $idarquivo = $ci1documento -> documento_id;
                    // elimina Anexo / Documento
                    $documento = A3clientepfDocumento::find($idarquivo);
                    if (!empty($documento)) {
                        $documento-> delete();
                    }
                    // elimina piDocumento
                    $ci1documento->delete();
                }
            }            
            // ajustando AGENDA - trocando CLiente por sem vinculo
            $registros = A3agenda::where('a3clientepf_id','=',$id)->get();
            if (!empty($registros)) {
                foreach($registros as $registro) {
                    $registro->a3clientepf_id = null;
                    $registro->titulo = $nome.' >Cliente eliminado do sistema';
                    $registro->cor = '#2196F3';
                    $registro->update();
                    // $registro->delete();
                }
            }

            // ELIMINA - CLIENTE (FIM)
            // if (Auth::user()->can('CLIENTE3-R')) {
                $cliente->delete();
                return "true";
            // }



        }
        return "false";
    }

    public function save(ValidateA3clientepf $request) {
        // die('TO QUIIIIIIIIIIIIIIIII   AAAAzzzzzzzzzzzzzzzzzzz');
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            if (Auth::user()->can('CLIENTE3-E')) {
                $pesquisador = A3clientepf::find($request->input('id'));
                if(!empty($pesquisador)) {
                    $pesquisador->update($allInputs);
                }
            }
        } else {
            // die('bbbbbbbbbbbbb');
            if (Auth::user()->can('CLIENTE3-A')) {
                $pesquisador = new A3clientepf($allInputs);
                $pesquisador->save();
                // pegando ID do novo registro
                $cpf = $request->input('cpf');
                $novo = DB::table('a3clientepf')->select('*')->where('cpf', '=', $cpf)->get();
                foreach ($novo as $novo1){
                    $novoid = $novo1->id;
                }
                // gerando formularios basicos
                // print($novoid);
                foreach(A3formulario::all() as $registro){
                    $novoformulario = new A3clientepfFormulario;
                    $novoformulario->a3clientepf_id  = $novoid;
                    $novoformulario->nome = $registro->nome;
                    $novoformulario->descricao = $registro->descricao;
                    $novoformulario->save();
                }    
            }
        }
    }

}    

