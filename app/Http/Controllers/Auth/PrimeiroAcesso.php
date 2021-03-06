<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Usuario;

class PrimeiroAcesso extends Controller
{
    public function trocaSenha() {
        return view('auth.passwords.troca-senha', ["user" => Auth::user()]);
    }

    public function actionTrocaSenha(Request $request) {
        // Checking current password
        if (!Hash::check($request->input("senha-atual"), Auth::user()->password)) {
            return redirect()->back()->withErrors(['senha-atual' => 'Senha atual incorreta']);
        }
        if ($request->input("password") !== $request->input("password_confirmation")) {
            return redirect()->back()->withErrors(['password_confirmation' => 'Senha e Confirmação de senha são diferentes']);
        }
        Auth::user()->update([
            "reseta_senha" => "nao",
            "password" => bcrypt($request->input("password")),
            ]);
        return redirect("/");
    } 
}
