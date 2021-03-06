<?php

namespace App\Http\Controllers\Action\Aplicativo3\Configuracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Acesso;

class VeacessoController extends Controller{

    public function list(){
        $response = [];
        // print_r('aaaaaaaaaaaaa');
        // die('xxxxx');
        foreach(Acesso::all() as $registro) {
            $item['id'] = $registro->id;
            $item['usuario'] = $registro->usuario;
            $item['nome'] = $registro->nome;
            $item['tipo'] = $registro->tipo;
            $item['data'] = $registro->data;
            $item['hora'] = $registro->hora;
            $response[] = $item;
        }
        return json_encode($response);
    }

}    

