<?php

namespace App\Http\Controllers\Aplicativo3\Paciente;

use App\Http\Controllers\Controller;
use App\Http\SideBarMenu;
use App\A3clientepf;
use App\A3clientepfHistorico;
use App\A3remedio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoricoController extends Controller{
    
    public function listhistorico($id){
        $cliente = A3clientepf::find($id);
        if (!empty($cliente)) {
             return view('aplicativo3.paciente.clientepfhistorico',["cliente" => $cliente, "remedios" => A3remedio::orderBy('nome', 'asc')->get()]);
        } else {
            return redirect()->route('aplicativo3.paciente');
        }
    }
    
}