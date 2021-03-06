<?php

namespace App\Http\Controllers\Aplicativo4\Animal;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\SideBarMenu;
use App\A4animal;
use App\A4proprietario;
use App\A4especie;
use App\A4raca;
use App\A4pelagem;

class ClienteController extends Controller{
    
    public function selecao() {
        if (!Auth::user()->can('ANIMAL-A') && !Auth::user()->can('ANIMAL-E') && !Auth::user()->can('ANIMAL-R') && !Auth::user()->can('ANIMAL-V')) {
            return redirect('/');
        }
        return view('aplicativo4.animal.clienteselecao',["pageTitle" => "Clientes", "pageDescription" => "Listagem dos Clientes (Pets)", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false ]);
    }


    // public function novocliente() {
    //     if (!Auth::user()->can('ANIMAL-A') && !Auth::user()->can('ANIMAL-E') && !Auth::user()->can('ANIMAL-R') && !Auth::user()->can('ANIMAL-V')) {
    //         return redirect('/');
    //     }
    //     return view('aplicativo4.animal.novocliente',["pageTitle" => "NOvo Clientes", "pageDescription" => "NOVO --", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "proprietarios" => A4proprietario::orderBy('nome', 'asc')->get() ]);
    // }

    public function novocliente() {
        if (!Auth::user()->can('ANIMAL-A') && !Auth::user()->can('ANIMAL-E') && !Auth::user()->can('ANIMAL-R') && !Auth::user()->can('ANIMAL-V')) {
            return redirect('/');
        }
        return view('aplicativo4.animal.novocliente',["primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "proprietarios" => A4proprietario::orderBy('nome', 'asc')->get() ]);
    }

    public function list($nome) {
        // $aa = $nome;
        // die($nome);
        if (!Auth::user()->can('ANIMAL-A') && !Auth::user()->can('ANIMAL-E') && !Auth::user()->can('ANIMAL-R') && !Auth::user()->can('ANIMAL-V')) {
            return redirect('/');
        }
        return view('aplicativo4.animal.cliente',[ "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "nome" => $nome, "proprietarios" => A4proprietario::orderBy('nome', 'asc')->get() ]);
    }


    // cleinte opcao de escolhas
    public function clienteopcao($id) {
        // die($id);
        $cliente = a4animal::find($id);
        if (!empty($cliente)) {
            return view('aplicativo4.animal.clienteopcao', ["pageTitle" => "EDIÇÃO DE INFORMAÇÕES DO PET - CLIENTE", "pageDescription" => "Dados do pet", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "cliente" => $cliente]);
        }

    }

    public function edit($id) {
        $cliente = a4animal::find($id);
        // console.log('aaaaa');
        // print('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
        // die;
        if (!empty($cliente)) {
            // return view('aplicativo2.projeto.projetoedit',  ["projeto" => $projeto, "nits" => Nit::orderBy('nomecurto', 'asc')->get()]);
            return view('aplicativo4.animal.clienteedit',  ["cliente" => $cliente, "proprietarios" => A4proprietario::orderBy('nome', 'asc')->get(), "especies" => A4especie::orderBy('nome', 'asc')->get(),"racas" => A4raca::orderBy('nome', 'asc')->get(), "pelagens" => A4pelagem::orderBy('nome', 'asc')->get() ]);
        } else {
            return redirect()->route('aplicativo4.animal.clienteedit');
        }
    }

    public function historico($id) {
        $cliente = a4animal::find($id);
        if (!empty($cliente)) {
            // return view('aplicativo2.projeto.projetoedit',  ["projeto" => $projeto, "nits" => Nit::orderBy('nomecurto', 'asc')->get()]);
            return view('aplicativo4.animal.clientehistorico',  ["cliente" => $cliente ]);
        } else {
            return redirect()->route('aplicativo4.animal.clientehistorico');
        }
    }


}