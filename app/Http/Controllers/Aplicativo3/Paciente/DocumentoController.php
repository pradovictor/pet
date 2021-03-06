<?php

namespace App\Http\Controllers\Aplicativo3\Paciente;

use App\Http\Controllers\Controller;
use App\Http\SideBarMenu;
use App\A3clientepf;
use App\A3clientepfDocumento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentoController extends Controller{
    
    public function listdocumento($id){
        $cliente = A3clientepf::find($id);
        if (!empty($cliente)) {
             return view('aplicativo3.paciente.clientepfdocumento',["cliente" => $cliente]);
        } else {
            return redirect()->route('aplicativo3.paciente');
        }
    }
    
}