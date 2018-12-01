<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LevelMiddleware {

    public function handle($request, Closure $next, $level) {
        if (Auth::user()->level >= $level) {
            return $next ($request);
        }else{
            return redirect('/');
        }
    }

}
