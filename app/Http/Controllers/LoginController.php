<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Usuario;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    


   public function __construct()
    {       
        /*
            Si el usuario intenta acceder al login y ya esta logueado 
            será redireccionado al home excepto cuando el usuario intente acceder
            a logout
        */
        $this->middleware('guest', ['except' => 'logout']);
    }                                                      
    public function showLogin(){       
        return view('login');
    }

    public function postLogin(Request $request){
       
        $usuario=new Usuario();
        $usuario->nombreUsuario=$request->input('usuario');
        $usuario->clave=$request->input('password');
        $remember=$request->input('remember');

        if(Auth::attempt(['nombreUsuario'=>$usuario->nombreUsuario,'password'=>$usuario->clave],$remember)){            
            //return view('inicio')->with('usuario',$usuario->nombreUsuario);
            return redirect()->intended('home')->with('usuario',$usuario->nombreUsuario);
        }else{
             return redirect()
                    ->back()
                    ->with(['mensaje_error'=>'Tus datos son incorrectos','clave'=>$usuario->clave])
                    ->withInput($request->except('password'));
        }      
        /*$user=DB::table('usuarios')->where([
        			['nombreUsuario','=',$usuario],
        			['clave','=',$clave]
        				])->value('nombreUsuario');*/
                                /*if($usuario==$user){
        	return view('inicio')->with('usuario',$user);
        }*/
        
       
    }

    public function logout(){
        Auth::logout();
        return redirect('login')->with('Close','Sesion cerrada con exito');
    }
}
