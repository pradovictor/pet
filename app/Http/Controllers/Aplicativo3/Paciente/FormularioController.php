<?php

namespace App\Http\Controllers\Aplicativo3\Paciente;

use App\Http\Controllers\Controller;
use App\Http\SideBarMenu;
use App\A3clientepf;
use App\A3clientepfFormulario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormularioController extends Controller{
    
    public function listformulario($id){
        $cliente = A3clientepf::find($id);
        if (!empty($cliente)) {
             return view('aplicativo3.paciente.clientepfformulario',["cliente" => $cliente]);
        } else {
            return redirect()->route('aplicativo3.paciente');
        }
    }
    
}