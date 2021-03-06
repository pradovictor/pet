<?php

namespace App\Http\Controllers\Aplicativo3\Precadastro;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\SideBarMenu;

class ProfissionalController extends Controller{
    
    public function list() {
        if (!Auth::user()->can('PRECADASTRO3-PROFISSIONAL-A') && !Auth::user()->can('PRECADASTRO3-PROFISSIONAL-E') && !Auth::user()->can('PRECADASTRO3-PROFISSIONAL-R') && !Auth::user()->can('PRECADASTRO3-PROFISSIONAL-V')) {
            return redirect('/');
        }
        return view('aplicativo3.precadastro.profissional',["pageTitle" => "Profissionais", "pageDescription" => "Listagem dos profissionais", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false ]);
    }

}