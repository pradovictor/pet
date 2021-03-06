<?php

namespace App\Http\Controllers\Aplicativo4\Precadastro;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\SideBarMenu;

class RacaController extends Controller{
    
    public function list() {
        if (!Auth::user()->can('PRECADASTRO4-A') && !Auth::user()->can('PRECADASTRO4-E') && !Auth::user()->can('PRECADASTRO4-R') && !Auth::user()->can('PRECADASTRO4-V')) {
            return redirect('/');
        }
        return view('aplicativo4.precadastro.raca',["pageTitle" => "Raça", "pageDescription" => "Listagem de raças", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false ]);
    }

}