<?php

namespace App\Http\Controllers\Aplicativo3\Precadastro;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\SideBarMenu;

class RemedioController extends Controller{
    
    public function list() {
        if (!Auth::user()->can('PRECADASTRO3-REMEDIO-A') && !Auth::user()->can('PRECADASTRO3-REMEDIO-E') && !Auth::user()->can('PRECADASTRO3-REMEDIO-R') && !Auth::user()->can('PRECADASTRO3-REMEDIO-V')) {
            return redirect('/');
        }
        return view('aplicativo3.precadastro.remedio',["pageTitle" => "Remedios", "pageDescription" => "Listagem dos remedios", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false ]);
    }

}