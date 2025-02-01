<?php

namespace App\Http\Middleware;

use App\LogAcesso;
use Closure;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP {$ip} requisitou a rota {$rota}"]);
        // return Response('chegammos no middleware e finalizamos no proprio middleware');
        // return $next($request);

        $resposta = $next($request);
        // $resposta->setStatusCode(201, 'O status e texto da resposta foi modificado');
        return $resposta;

        // dd($resposta);
    }
}
