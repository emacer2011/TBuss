<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if ($request->user() === null) {
            // return response("Permisos Insuficientes",401);
            abort(403, 'Permisos Insuficientes.');
        }
        // dd($request->user());
        $actions = $request->route()->getAction();
        $url = isset($actions['url']) ? $actions['url'] : null;
        $action = isset($actions['action']) ? $actions['action'] : null;
        // $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if ($request->user()->hasAnyRole($url,$action) || !$url || !$action) {
            return $next($request);
        }
        abort(403, 'Permisos Insuficientes');
    }
}
