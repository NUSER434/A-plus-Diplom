<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ShareCartCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Получаем текущего пользователя
        $user = Auth::user();

        // Количество товаров в корзине
        $cartCount = $user ? $user->cart_count : 0;

        // Передаем данные в шаблон
        View::share('cartCount', $cartCount);

        return $next($request);
    }
}
