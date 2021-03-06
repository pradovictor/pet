<?php

namespace App\Http\Controllers\Aplicativo3\Configuracao;

use App\Http\Controllers\Controller;
use App\Http\SideBarMenu;
use App\A3parametro;

class ParametroController extends Controller{
    
    public function edit($id) {
        // die($id);
        $parametro = A3parametro::find($id);
        // die($parametro);
        if (!empty($parametro)) {
            return view('aplicativo3.configuracao.parametroEdit', ["pageTitle" => "Edição de Parametros", "pageDescription" => "Parametros do Sistema", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "parametro" => $parametro ]); 
        } else {
            return redirect()->route('Aplicativo3.Configuracao-parametroEdit');
        }
    }

}