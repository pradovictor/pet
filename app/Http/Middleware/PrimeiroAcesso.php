<?php

namespace App\Http\Middleware;

use Closure;

class PrimeiroAcesso {

    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user->reseta_senha === 'sim') {
            return redirect()->route('primeiroacesso.trocasenha');
        }

        return $next($request);
    }
}