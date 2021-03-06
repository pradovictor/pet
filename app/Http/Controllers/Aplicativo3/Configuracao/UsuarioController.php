<?php

namespace App\Http\Controllers\Aplicativo3\Configuracao;

use App\Http\Controllers\Controller;
use App\Http\SideBarMenu;
use App\Usuario;
use App\Permissao;
// use App\Nit;

// ajustado Configuracao = C
class UsuarioController extends Controller{
    
    public function list() {
        return view('aplicativo3.configuracao.usuarios',["pageTitle" => "Usuarios", "pageDescription" => "Listagem dos usuarios", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false]);
    }

    public function edit($id) {
        $usuario = Usuario::find($id);
        if (!empty($usuario)) {
            return view('aplicativo3.configuracao.usuariosEdit', ["pageTitle" => "Edição do Usuario", "pageDescription" => "Edição dos dados do usuario", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "usuario" => $usuario, "permissoes" => Permissao::orderBy('nome', 'asc')->get() ]); 
        } else {
            return redirect()->route('Aplicativo3.Configuracao-usuariosEdit');
        }
    }

    public function new() {
        return view('aplicativo3.configuracao.usuariosEdit', ["pageTitle" => "Novo Usuario", "pageDescription" => "Adicione um novo usuarios", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "permissoes" => Permissao::orderBy('nome', 'asc')->get() ]); 
    }
}