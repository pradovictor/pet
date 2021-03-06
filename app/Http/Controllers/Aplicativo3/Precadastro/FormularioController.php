<?php

namespace App\Http\Controllers\Aplicativo3\Precadastro;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\SideBarMenu;

class FormularioController extends Controller{
    
    public function list() {
        if (!Auth::user()->can('PRECADASTRO3-FORMULARIO-A') && !Auth::user()->can('PRECADASTRO3-FORMULARIO-E') && !Auth::user()->can('PRECADASTRO3-FORMULARIO-R') && !Auth::user()->can('PRECADASTRO3-FORMULARIO-V')) {
            return redirect('/');
        }
        return view('aplicativo3.precadastro.formulario',["pageTitle" => "Formularios", "pageDescription" => "Listagem dos formularios", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false ]);
    }

}