<?php

namespace App\Http\Controllers\Aplicativo4\Precadastro;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\SideBarMenu;

class EspecieController extends Controller{
    
    public function list() {
        if (!Auth::user()->can('PRECADASTRO4-A') && !Auth::user()->can('PRECADASTRO4-E') && !Auth::user()->can('PRECADASTRO4-R') && !Auth::user()->can('PRECADASTRO4-V')) {
            return redirect('/');
        }
        return view('aplicativo4.precadastro.especie',["pageTitle" => "Especie", "pageDescription" => "Listagem de especies", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false ]);
    }

}