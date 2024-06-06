<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Support\Facades\Auth;
 
class OnlySivitas
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
        // kasi tau selain admin kemana
        if (Auth::user()->id_role != 2 || Auth::user()->id_role !=3) {
            return redirect('dashboard');
        }
        return $next($request);
    }
}