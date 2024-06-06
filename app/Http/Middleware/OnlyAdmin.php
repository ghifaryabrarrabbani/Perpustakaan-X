<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Support\Facades\Auth;
 
class OnlyAdmin
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
        if (Auth::user()-> id_role != 1) {
            return redirect('home');
        }        
        // apa yang dilakukan
        return $next($request);
    }
}