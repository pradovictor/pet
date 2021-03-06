<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Documento;
use App\Anexo1;
use App\ProjetoDocumento;
use App\A2projetoDocumento;  //  SISTEMA 2 - GESTAO DE PROJETOS
// use App\A3clientepfDocumento; // SISTEMA 3 - MEDICO
use App\COLink;

class FileController extends Controller{
    
    public function upload(Request $request) {
        $path = $request->file('file')->store('temp');
        return $path;
    }

    public function download($id) {
        $documento = Documento::find($id);
        $pos = strpos($documento->mime_type,'/');
        $tot = strlen($documento->mime_type);
        // $extensao = substr($documento->mime_type,$pos+1,$tot-$pos);
        $extensao = $documento->extensao;
        // print_r($extensao);
        // die('============');
       
        // print($extensao);
        // die();

        if (!empty($documento)) {
            return response($documento->documento)
                // ->header('Content-Type', 'image/jpg')
                ->header('Content-Type', $documento->mime_type)
                // ->header('Content-Disposition', 'attachment; filename=file.jpeg');  // attachment ou inline
                ->header('Content-Disposition', 'attachment; filename=Arquivo.' . $extensao); 
        }
    }

    public function anexo1download($id) {
        $documento = Anexo1::find($id);
        $pos = strpos($documento->mime_type,'/');
        $tot = strlen($documento->mime_type);
        $extensao = $documento->extensao;
        if (!empty($documento)) {
            return response($documento->documento)
                ->header('Content-Type', $documento->mime_type)
                ->header('Content-Disposition', 'attachment; filename=Arquivo.' . $extensao); 
        }
    }
    
    public function projetodocumentodownload($id) {
        $documento = ProjetoDocumento::find($id);
        $pos = strpos($documento->mime_type,'/');
        $tot = strlen($documento->mime_type);
        $extensao = $documento->extensao;
        if (!empty($documento)) {
            return response($documento->documento)
                ->header('Content-Type', $documento->mime_type)
                ->header('Content-Disposition', 'attachment; filename=Arquivo.' . $extensao); 
        }
    }

    // sistema 2
    public function projeto2documentodownload($id) {
        $documento = A2projetoDocumento::find($id);
        $pos = strpos($documento->mime_type,'/');
        $tot = strlen($documento->mime_type);
        $extensao = $documento->extensao;
        if (!empty($documento)) {
            return response($documento->documento)
                ->header('Content-Type', $documento->mime_type)
                ->header('Content-Disposition', 'attachment; filename=Arquivo.' . $extensao); 
        }
    }
    
    // sistema 3
    // public function cliente3documentodownload($id) {
    //     $documento = A3clientepfDocumento::find($id);
    //     $pos = strpos($documento->mime_type,'/');
    //     $tot = strlen($documento->mime_type);
    //     $extensao = $documento->extensao;
    //     if (!empty($documento)) {
    //         return response($documento->documento)
    //             ->header('Content-Type', $documento->mime_type)
    //             ->header('Content-Disposition', 'attachment; filename=Arquivo.' . $extensao); 
    //     }
    // }

    // public function localsite($id) {
    //     $registro = COLink::find($id);
    //     if (!empty($registro)) {
    //         $site = $registro->site;

    //         print_r($id);
    //         print('cheguei rrsrsr ------');
    //         print($site);
    //
    //         return redirect()->to($site)->send();  // laravel 
    //     }

    // }
}    

