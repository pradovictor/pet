<?php

namespace App\Http\Controllers;

use App\Http\SideBarMenu;
use App\Tecnologia;
use App\PIRegistro;
use App\PI;

class DashboardController extends Controller
{

  public function show()  {
    $piRegistroPorAno = PIRegistro::getCountByYear();
    $piTecnologiaAno = PIRegistro::getTecCountByYear();
    $tecCadastrado = PI::getTecCount();
    $piConcedidoPorAno = PIRegistro::getCountConcedidoByYear();
    $status = PIRegistro::getStatusCount();
    // print_r($status);
    // die('==========');
    return view('dashboard.show',["pageTitle" => "Dashboard", "pageDescription" => "Resumo das tecnologias", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => SideBarMenu::getSubMenu('fi'),  "tecCadastrado" => $tecCadastrado , "piRegistroPorAno" => $piRegistroPorAno ,  "piTecnologiaAno" => $piTecnologiaAno, "piConcedidoPorAno" => $piConcedidoPorAno, "status" => $status ]);
  }

  public function demo_show()  {
    return view('dashboard.demo_show',["pageTitle" => "Dashboard", "pageDescription" => "Resumo das tecnologias", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => SideBarMenu::getSubMenu('fi')]);
  }

}
