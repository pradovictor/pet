<?php

namespace App\Http\Controllers\Action\Aplicativo3\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\A3clientepf;
use App\A3clientepfDocumento;
use App\A3clientepfInfodocumento;
use App\Http\Requests\ValidateA3clientepfInfodocumento;  
use Carbon\Carbon;

class DocumentoController extends Controller{
    
    public function list($clienteID){
        // die('to qui ----akakakaka');
        $registro = A3clientepf::find($clienteID);
        $registroInfodocumentos = [];
        if (!empty($registro)) {
            foreach($registro->clienteInfodocumentos as $registroDocumento) {
                $registroInfodocumentos[] =  [
                    "id"=> $registroDocumento->id,
                    "nome" => $registroDocumento->nome,
                    "extensao" => $registroDocumento->extensao,
                    "data_cadastro" => $registroDocumento->data_cadastro,  
                    "descricao" => $registroDocumento->descricao,
                    "comentario" => $registroDocumento->comentario,  
                    "documento" => "Documento::".url('/action/aplicativo3/paciente/cliente3documentodownloadfile/')."/".$registroDocumento->documento_id,  
                    "actions" => [false, Auth::user()->can('CLIENTE3-DOCUMENTO-E'), Auth::user()->can('CLIENTE3-DOCUMENTO-R'), false],  
                    // "actions" => [true, true, true, false], 
                ];
            }
        }
        return response()->json($registroInfodocumentos);
    }

    public function getViewById($id){
        // die('getview  ---- bbb to qui');
        $projetoInfodocumento = A3clientepfInfodocumento::find($id);
        if (!empty($projetoInfodocumento)) {
            return view('projeto.anexo1', ["ci1Anexo1" => $projetoInfodocumento]);           
        }
    }

    public function getById($id){
        // die('getbyidzzz ---- bbb to qui');
        $registroInfodocumento = A3clientepfInfodocumento::find($id);
        if (!empty($registroInfodocumento)) {
            return response()->json($registroInfodocumento);
        }
        return response()->json(array('error' => true));
    }

    public function save($projetoId, ValidateA3clientepfInfodocumento $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            //edição
            if (Auth::user()->can('CLIENTE3-DOCUMENTO-E')) {
                // die('11111');
                $ci1Anexo1 = A3clientepfInfodocumento::find($request->input('id'));
                if(!empty($ci1Anexo1)) {
                    $ci1Anexo1->update($allInputs);
                }
            }    
        } else {
            // novo registro
            if (Auth::user()->can('CLIENTE3-DOCUMENTO-A')) {
                // novo registro - Documento
                $anexo1 = new A3clientepfDocumento();
                $anexo1->documento = file_get_contents(Input::file('file')->getRealPath());
                $anexo1->mime_type = Input::file('file')->getMimeType();       
                $anexo1->extensao = Input::file('file')->getClientOriginalExtension(); 
                $anexo1->save();
                //novo registro - ci1 anexo1
                $ci1Anexo1 = new A3clientepfInfodocumento($allInputs);
                $ci1Anexo1->data_cadastro = new Carbon();
                $ci1Anexo1->a3clientepf_id = $projetoId;
                $ci1Anexo1->documento_id = $anexo1->id;
                $ci1Anexo1->extensao = Input::file('file')->getClientOriginalExtension();
                $ci1Anexo1->save();
            }
        }
    }

    public function delete($id) {
        $infodocu = A3clientepfInfodocumento::find($id);
        if (!empty($infodocu)) {
            if (Auth::user()->can('CLIENTE3-DOCUMENTO-R')) {
                $idarquivo = $infodocu -> documento_id;
                // elimina arquivo em Documento
                $Documento = A3clientepfDocumento::find($idarquivo);
                if (!empty($Documento)) {
                    $Documento-> delete();
                }
                // elimina registro em ci1Anexo1
                $infodocu->delete();
                return "true";
            }    
        }
        return "false";
    }

    // sistema 3
    public function cliente3documentodownload($id) {
        $documento = A3clientepfDocumento::find($id);
        $pos = strpos($documento->mime_type,'/');
        $tot = strlen($documento->mime_type);
        $extensao = $documento->extensao;
        if (!empty($documento)) {
            return response($documento->documento)
                ->header('Content-Type', $documento->mime_type)
                ->header('Content-Disposition', 'attachment; filename=Arquivo.' . $extensao); 
        }
    }



}    

