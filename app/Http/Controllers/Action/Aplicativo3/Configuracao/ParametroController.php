<?php

namespace App\Http\Controllers\Action\Aplicativo3\Configuracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\A3parametro;
// use Illuminate\Support\Facades\Mail;
// use App\Usuario;
use App\Http\Requests\ValidateA3parametro;
// use App\Mail\FirstAccess;
// use App\Permissao;
// use App\UsuarioNit;
// use App\UsuarioPermissao;

class ParametroController extends Controller{
    
    // public function list(){
    //    $usuarios = Usuario::all();
    //    $response = [];
    //    foreach($usuarios as $usuario) {
    //         $response[] = [
    //             "id" => $usuario->id,
    //             "email" => $usuario->email,
    //             "nome" => $usuario->nome,
    //             "actions" => [Auth::user()->can('USUARIO-A'), Auth::user()->can('USUARIO-E'), Auth::user()->can('USUARIO-R'), Auth::user()->can('USUARIO-V')],  
    //         ];
    //    }
    //    return response()->json($response);
    // }

    // public function delete($id){
    //     $registro = Usuario::find($id);
    //     if (!empty($registro)) {
    //         if (Auth::user()->can('USUARIO-R')) {
    //             $usu_permissoes = UsuarioPermissao::where('usuario_id','=',$id)->get();
    //             foreach($usu_permissoes as $usu_permissao) {
    //                 $usu_permissao->delete();
    //             }
    //             $registro->delete();
    //             return "true";
    //         }
    //     }
    //     return "false";
    // }

    // public function getById($id) {
    //     $registro = A3parametro::find($id);
    //     if (!empty($registro)) {
    //         return response()->json($registro);
    //     }
    //     return response()->json(array('error' => true));
    // }

    public function save(ValidateA3parametro $request) {
        // die('--TO QUI - SAVE');
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            // edicao
            // if (Auth::user()->can('USUARIO-E')) {
                $registro = A3parametro::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->update($allInputs);
                }
            // }
        } 
    }

    // private function randomPassword() {
    //     $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    //     for ($i = 0; $i < 6; $i++) {
    //         $n = rand(0, strlen($alphabet) - 1);
    //         $pass[$i] = $alphabet[$n];
    //     }
    //     return implode('', $pass);
    // }
}    

