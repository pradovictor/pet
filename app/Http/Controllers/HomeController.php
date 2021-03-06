<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\SideBarMenu;

// use - para acessasr e gravar registro do usuario
// use Illuminate\Support\Facades\Auth;
// use App\Acesso;

class HomeController extends Controller
{

  public function show(Request $request)  {

    // gera registro db acesso
    // $registro = new Acesso();
    // $registro->usuario = Auth::user()->email;
    // $registro->nome = Auth::user()->nome;
    // $registro->data = date('Y-m-d');
    // $registro->hora = date('H:i:s');
    // $registro->save();
    // fim do registro

    $subdomain = explode('.', $request->server('HTTP_HOST'))[0];
    return view('home.show',["pageTitle" => "", "pageDescription" => "", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => SideBarMenu::getSubMenu('fi'), "subdomain" => $subdomain]);
  }
  
}
