<?php

namespace App\Http\Controllers\Aplicativo4\Animal;

use App\Http\Controllers\Controller;
use App\Http\SideBarMenu;
use App\A4animal;
use App\A4animalPeso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesoController extends Controller{
    
    public function listpeso($id){
        $cliente = A4animal::find($id);
        if (!empty($cliente)) {
             return view('aplicativo4.animal.clientepeso',["cliente" => $cliente]);
        } else {
            return redirect()->route('aplicativo4.animal');
        }
    }
    
}