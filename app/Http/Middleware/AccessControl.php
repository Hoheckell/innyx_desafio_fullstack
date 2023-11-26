<?php

namespace App\Http\Middleware;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('api/categorias/*',)) {
            $model = Categoria::class;
        }
        if ($request->is('api/categorias',)) {
            $model = Categoria::class;
        }
        if ($request->is('api/produtos/*',)) {
            $model = Produto::class;
        }
        if ($request->is('api/produtos',)) {
            $model = Produto::class;
        }
        if ($request->is('api/users/*')) {
            $model = User::class;
        }
        if ($request->is('api/users')) {
            $model = User::class;
        }
        if ($request->is('api/roles')) {
            $model = Role::class;
        }
        if ($request->isMethod('post')) {
            $action = 'CREATE';
        }
        if ($request->isMethod('get')) {
            $action = 'READ';
        }
        if ($request->isMethod('put') || $request->isMethod('patch')) {
            $action = 'UPDATE';
        }
        if ($request->isMethod('delete')) {
            $action = 'DELETE';
        }

        if(!empty(Auth::user()) && !Auth::user()->isAuthorized($model,$action)) {
            return response()->json([
                'message' => 'Autorização negada.'
            ], 401);
        }
        return $next($request);
    }
}
