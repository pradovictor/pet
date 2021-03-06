<?php

namespace App\Http\Controllers\Aplicativo3\Configuracao;

use App\Http\Controllers\Controller;
use App\Http\SideBarMenu;


class VeacessoController extends Controller{
    
    public function list() {
        // print_r('to passand por aqui =====2======================================================');
        // die('---');
        return view('aplicativo3.configuracao.veacesso',["pageTitle" => "Acesso", "pageDescription" => "Listagem de Acesso de usuários", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false]);
    }

}