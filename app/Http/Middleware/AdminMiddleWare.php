<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleWare
{
    
    public function handle($request, Closure $next)
    {
        if ($request->user()->account_type != 1)
        {
            return redirect('cashier')
                ->with('error', 'Access Denied.');
        }

        return $next($request);
    }
}
