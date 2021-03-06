<?php

namespace App\Http\Controllers\Action\Aplicativo3\Configuracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Usuario;
use App\Http\Requests\ValidateUsuario;
use App\Mail\FirstAccess;
use App\Permissao;
use App\UsuarioNit;
use App\UsuarioPermissao;
// use App\Nit;


class UsuarioController extends Controller{
    
    public function list(){
       $usuarios = Usuario::all();
       $response = [];
       foreach($usuarios as $usuario) {
            $response[] = [
                "id" => $usuario->id,
                "email" => $usuario->email,
                "nome" => $usuario->nome,
                "actions" => [Auth::user()->can('USUARIO-A'), Auth::user()->can('USUARIO-E'), Auth::user()->can('USUARIO-R'), Auth::user()->can('USUARIO-V')],  
            ];
       }
       return response()->json($response);
    }

    public function delete($id){
        $registro = Usuario::find($id);
        if (!empty($registro)) {
            if (Auth::user()->can('USUARIO-R')) {
                // eliminando nits
                // $usu_nits = UsuarioNit::where('usuario_id','=',$id)->get();
                // foreach($usu_nits as $usu_nit) {
                //     $usu_nit->delete();
                // }
                // eliminando permissoes
                $usu_permissoes = UsuarioPermissao::where('usuario_id','=',$id)->get();
                foreach($usu_permissoes as $usu_permissao) {
                    $usu_permissao->delete();
                }
                // eliminando registro usuario
                $registro->delete();
                return "true";
            }
        }
        return "false";
    }

    public function getById($id) {
        $registro = Usuario::find($id);
        if (!empty($registro)) {
            return response()->json($registro);
        }
        return response()->json(array('error' => true));
    }

    public function save(ValidateUsuario $request) {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        unset($allInputs["id"]);
        if(!empty($request->input('id'))){
            // edicao
            if (Auth::user()->can('USUARIO-E')) {
                $registro = Usuario::find($request->input('id'));
                if(!empty($registro)) {
                    $registro->update($allInputs);
                }
                // NIT
                // eliminando usuario_nit - somente sistema 1 - nitsys (sistema 2 - nao)
                // $subdomain = explode('.', $_SERVER['HTTP_HOST'])[0];
                // if (($subdomain <> '2dev') && ($subdomain <> 'sciel') && ($subdomain <> 'oraljet'))  {

                //     $usu_nits = UsuarioNit::where('usuario_id','=',$request->input('id'))->get();
                //     foreach($usu_nits as $usu_nit) {
                //         $usu_nit->delete();
                //     }
                //     // adicionando usuario_nit
                //     foreach($request->input('nits') as $idnit){
                //         $nit = Nit::find($idnit);
                //         if(!empty($nit)){
                //             $usuarionit = new UsuarioNit();
                //             $usuarionit->usuario_id = $request->input('id');
                //             $usuarionit->nit_id = $idnit;
                //             $usuarionit->save();
                //         }    
                //     }
                // }    

                // PERMISSOES
                // eliminando usuario_permissao
                $usu_permissoes = UsuarioPermissao::where('usuario_id','=',$request->input('id'))->get();
                foreach($usu_permissoes as $usu_permissao) {
                    $usu_permissao->delete();
                }
                // adicionando usuario_permissao
                foreach($request->input('permissoes') as $idpermissao){
                    $usuariopermissao = new UsuarioPermissao();
                    $usuariopermissao->usuario_id = $request->input('id');
                    $usuariopermissao->permissao_identificador = $idpermissao;
                    $usuariopermissao->save();  
                }
            }
        } else {
            // novo
            if (Auth::user()->can('USUARIO-A')) {
                $usuario = new Usuario($allInputs);
                $pass = $this->randomPassword();
                $usuario->password = bcrypt($pass);
                $usuario->save();

                Mail::to($usuario->email)->send(new FirstAccess($usuario, $pass));
                // adicionando usuario_nit
                // foreach($request->input('nits') as $idnit){
                //     $nit = Nit::find($idnit);
                //     if (!empty($nit)){
                //         $usuarionit = new UsuarioNit();
                //         $usuarionit->usuario_id = $usuario->id;
                //         $usuarionit->nit_id = $nit->id;
                //         $usuarionit->save();
                //     }
                // }
                // adicionando usuario_permissao
                foreach($request->input('permissoes') as $idpermissao){
                    $usuariopermissao = new UsuarioPermissao();
                    $usuariopermissao->usuario_id = $usuario->id;
                    $usuariopermissao->permissao_identificador = $idpermissao;
                    $usuariopermissao->save();  
                }
            }
        }
    }

    private function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, strlen($alphabet) - 1);
            $pass[$i] = $alphabet[$n];
        }
        return implode('', $pass);
    }
}    

