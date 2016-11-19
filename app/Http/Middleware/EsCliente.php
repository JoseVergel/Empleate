<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class EsCliente
{
    
   /*protected $auth;
    public function __construct(Guard $auth){
        $this->auth=$auth;
    }*/
    public function handle($request, Closure $next,$guard=null)
    {
        if(Auth::guard($guard)->guest()){            
           return redirect()->guest('login');      
        }  
         
        /*if($this->auth->guest())
          redirect()->guest('login');
        else*/
            /*if($this->auth->check())
                return redirect('inicio');*/

        return $next($request);
    }
}
