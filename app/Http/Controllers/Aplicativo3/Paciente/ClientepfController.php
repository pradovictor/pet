<?php

namespace App\Http\Controllers\Aplicativo3\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\SideBarMenu;
use App\A3clientepf;
use App\A3remedio;
use App\A3parametro;

class ClientepfController extends Controller{
    
    public function chama() {
        // if (!Auth::user()->can('PRECADASTRO-PESQUISADOR-A') && !Auth::user()->can('PRECADASTRO-PESQUISADOR-E') && !Auth::user()->can('PRECADASTRO-PESQUISADOR-R') && !Auth::user()->can('PRECADASTRO-PESQUISADOR-V')) {
        //     return redirect('/');
        // }
        // die('xxxxxxxxxxxxxxxxxxx');
        return view('aplicativo3.paciente.chamaclientepf',["pageTitle" => "Clientes - Pessoa Física", "pageDescription" => "Listagem dos Clientes - PF", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false]);
    }

    public function list($nome) {
        // die('xxxxxxxxxxxxxxxxxxx');
        // return view('aplicativo3.paciente.clientepf',["pageTitle" => "Clientes - Pessoa Física", "pageDescription" => "Listagem dos Clientes - PF", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false]);
        return view('aplicativo3.paciente.clientepf',[ "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "nome" => $nome  ]);

    }

    public function edit($id) {
        // if (!Auth::user()->can('PRECADASTRO-PESQUISADOR-E')) {
        //     return redirect('/');
        // }
        $clientepf = A3clientepf::find($id);
        // die($clientepf);
        if (!empty($clientepf)) {
            return view('aplicativo3.paciente.clientepfEdit', ["clientepf" => $clientepf]);
        } else {
            return redirect()->route('aplicativo3.clientepfEdit');
        }
    }

    // dit do projeto
    // public function edit($id) {
    //     $projeto = a2projeto::find($id);
    //     if (!empty($projeto)) {
    //         return view('aplicativo2.projeto.projetoedit',  ["projeto" => $projeto]);
    //     } else {
    //         return redirect()->route('aplicativo2.projeto.projetoedit');
    //     }
    // }




    public function new() {
        // if (!Auth::user()->can('PRECADASTRO-PESQUISADOR-A')) {
        //     return redirect('/');
        // }
        return view('aplicativo3.paciente.clientepfEdit', ["pageTitle" => "Novo CLiente - Pessoa Física", "pageDescription" => "Adicione um novo cliente - Pessoa Fisica", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false ]);
    }


    public function viewselecao($id) {
        // die($id);
        $clientepf = a3clientepf::find($id);
        if (!empty($clientepf)) {
            return view('aplicativo3.paciente.clientepfselecao', ["pageTitle" => "EDIÇÃO DO CLIENTE", "pageDescription" => "Dados gerais do cliente", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "clientepf" => $clientepf]);
        } else {
            return redirect('/')->route('aplicativo3.paciente.clientepfselecao');
        }

    }

    // dentro do edit - clientepf
    public function visao($id) {
        $clientepf = a3clientepf::find($id);
        $parametro = a3parametro::find(1);
        if (!empty($clientepf)) {
            return view('aplicativo3.paciente.clientepfvisao',  ["clientepf" => $clientepf, "remedios" => A3remedio::orderBy('nome', 'asc')->get(), "parametro" => $parametro]);
        } else {
            return redirect()->route('/');
        }
    }

    // fora - tela inicial clientepf

    public function viewext($id) {
        // die($id);
        $clientepf = a3clientepf::find($id);
        if (!empty($clientepf)) {
            return view('aplicativo3.paciente.clientepfviewext', ["pageTitle" => "VISUALIZAÇÃO - CLIENTE", "pageDescription" => "Informações do cliente", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "clientepf" => $clientepf]);
        } else {
            return redirect()->route('/');
        }
    }


    // public function viewext($id) {
    //     // die('aaaaaazzzzzzzzzzzzzzz');
    //     $clientepf = a3clientepf::find($id);
    //     if (!empty($clientepf)) {
    //         return view('aplicativo3.paciente.clientepfviewext',  ["clientepf" => $clientepf]);
    //     } else {
    //         return redirect()->route('/');
    //     }
    // }

}