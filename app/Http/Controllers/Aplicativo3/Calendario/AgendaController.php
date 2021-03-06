<?php

namespace App\Http\Controllers\Aplicativo3\Calendario;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\SideBarMenu;
use App\A3clientepf;
use App\A3parametro;
use App\A3profissional;

class AgendaController extends Controller{
    
    public function list2() {
        // $profissional = a3profissional::find($id);
        // die('TOQUIAAAAAAAAAA');
        if (!Auth::user()->can('AGENDA3-A') && !Auth::user()->can('AGENDA3-E') && !Auth::user()->can('AGENDA3-R') && !Auth::user()->can('AGENDA3-V')) {
            return redirect('/');
        }
        $parametro = a3parametro::find(1);
        return view('aplicativo3.calendario.agenda',["pageTitle" => "Agenda - ", "pageDescription" => "", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "clientespf" => a3clientepf::orderBy('nome', 'asc')->get(), "parametro" => $parametro, "profissionais" => a3profissional::orderBy('nome', 'asc')->get()]);
    }


    public function list($id) {
        $profissional = a3profissional::find($id);
        // die('TOQUIAAAAAAAAAA');
        if (!Auth::user()->can('AGENDA3-A') && !Auth::user()->can('AGENDA3-E') && !Auth::user()->can('AGENDA3-R') && !Auth::user()->can('AGENDA3-V')) {
            return redirect('/');
        }
        $parametro = a3parametro::find(1);
        return view('aplicativo3.calendario.agendaprof',["pageTitle" => "Agenda - ".$profissional->nome, "pageDescription" => "", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "clientespf" => a3clientepf::orderBy('nome', 'asc')->get(), "parametro" => $parametro, "profissionais" => a3profissional::orderBy('nome', 'asc')->get(), "idprof" => $id]);
    }

    public function listtodos() {
        // die('TOQUIAAAAAAAAAA');
        if (!Auth::user()->can('AGENDA3-A') && !Auth::user()->can('AGENDA3-E') && !Auth::user()->can('AGENDA3-R') && !Auth::user()->can('AGENDA3-V')) {
            return redirect('/');
        }
        $parametro = a3parametro::find(1);
        return view('aplicativo3.calendario.agendaproftodos',["pageTitle" => "Agenda - Todos os Profissionais", "pageDescription" => "", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "clientespf" => a3clientepf::orderBy('nome', 'asc')->get(), "parametro" => $parametro, "profissionais" => a3profissional::orderBy('nome', 'asc')->get()]);
    }


    public function cadastro() {
        // die('TOQUIAAAAAAAAAA');
        if (!Auth::user()->can('AGENDA3-A') && !Auth::user()->can('AGENDA3-E') && !Auth::user()->can('AGENDA3-R') && !Auth::user()->can('AGENDA3-V')) {
            return redirect('/');
        }
        return view('aplicativo3.calendario.agendacadastro',["pageTitle" => "Cadastro - Agenda", "pageDescription" => "Listagem de agendamentos", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false, "clientespf" => a3clientepf::orderBy('nome', 'asc')->get(), "profissionais" => a3profissional::orderBy('nome', 'asc')->get()]);
    }


    public function selecao() {
        // die('TOQUIAAAAAAAAAA');
        if (!Auth::user()->can('AGENDA3-A') && !Auth::user()->can('AGENDA3-E') && !Auth::user()->can('AGENDA3-R') && !Auth::user()->can('AGENDA3-V')) {
            return redirect('/');
        }
        $parametro = a3parametro::find(1);
        return view('aplicativo3.calendario.selecao',["pageTitle" => "AGENDA", "pageDescription" => "Agenda dos profissionais", "primaryMenu" => SideBarMenu::getPrimaryMenu(), "subMenu" => false,"clientespf" => a3clientepf::orderBy('nome', 'asc')->get(), "parametro" => $parametro, "profissionais" => a3profissional::orderBy('nome', 'asc')->get()]);
    }

    public function veagenda($id){
        $parametro = a3parametro::find(1);
       return view('aplicativo3.calendario.agenda2',["clientespf" => a3clientepf::orderBy('nome', 'asc')->get(), "parametro" => $parametro, "profissionais" => a3profissional::orderBy('nome', 'asc')->get(),"id" => $id, "idprof" => $id]);
    }


}