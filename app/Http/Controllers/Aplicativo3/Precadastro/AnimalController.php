<?php

namespace App\Http\Controllers\Aplicativo3\Precadastro;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\SideBarMenu;
use App\A4cliente;

class AnimalController extends Controller{
    
    // public function listdocumento($id){
    //     $cliente = A3clientepf::find($id);
    //     if (!empty($cliente)) {
    //          return view('aplicativo3.paciente.clientepfdocumento',["cliente" => $cliente]);
    //     } else {
    //         return redirect()->route('aplicativo3.paciente');
    //     }
    // }


    public function selecao() {
        if (!Auth::user()->can('PRECADASTRO3-REMEDIO-A') && !Auth::user()->can('PRECADASTRO3-REMEDIO-E') && !Auth::user()->can('PRECADASTRO3-REMEDIO-R') && !Auth::user()->can('PRECADASTRO3-REMEDIO-V')) {
            return redirect('/');
        }
        return view('aplicativo3.precadastro.animalselecao',["pageTitle" => "Animais", "pageDescription" => "Listagem dos animais", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false ]);
    }

    public function list($nome) {
        // $aa = $nome;
        // die($nome);
        if (!Auth::user()->can('PRECADASTRO3-REMEDIO-A') && !Auth::user()->can('PRECADASTRO3-REMEDIO-E') && !Auth::user()->can('PRECADASTRO3-REMEDIO-R') && !Auth::user()->can('PRECADASTRO3-REMEDIO-V')) {
            return redirect('/');
        }
        return view('aplicativo3.precadastro.animal',[ "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "nome" => $nome, "proprietarios" => A4cliente::orderBy('nome', 'asc')->get() ]);
    }


}