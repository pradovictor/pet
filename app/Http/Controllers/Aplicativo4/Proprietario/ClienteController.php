<?php

namespace App\Http\Controllers\Aplicativo4\Proprietario;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\SideBarMenu;
use App\A4proprietario;

class ClienteController extends Controller{
    
    // public function listdocumento($id){
    //     $cliente = A3clientepf::find($id);
    //     if (!empty($cliente)) {
    //          return view('aplicativo3.paciente.clientepfdocumento',["cliente" => $cliente]);
    //     } else {
    //         return redirect()->route('aplicativo3.paciente');
    //     }
    // }


    public function selecao() {
        if (!Auth::user()->can('PROPRIETARIO-A') && !Auth::user()->can('PROPRIETARIO-E') && !Auth::user()->can('PROPRIETARIO-R') && !Auth::user()->can('PROPRIETARIO-V')) {
            return redirect('/');
        }
        return view('aplicativo4.proprietario.clienteselecao',["pageTitle" => "Proprietarios", "pageDescription" => "Listagem dos Proprietarios", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false ]);
    }

    public function list($nome) {
        // $aa = $nome;
        // die($nome);
        if (!Auth::user()->can('PROPRIETARIO-A') && !Auth::user()->can('PROPRIETARIO-E') && !Auth::user()->can('PROPRIETARIO-R') && !Auth::user()->can('PROPRIETARIO-V')) {
            return redirect('/');
        }
        return view('aplicativo4.proprietario.cliente',[ "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "nome" => $nome, "proprietarios" => A4proprietario::orderBy('nome', 'asc')->get() ]);
    }

}