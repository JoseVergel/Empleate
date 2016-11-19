<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Administrador;

class AdminLoginController extends Controller
{     
    
    public function __construct(){ 
        /*
            
        */                                         
       $this->middleware('RedirectIfAdminAuthenticated', ['except' => 'logout']);
    }

    public function show(){        
        return view('admin/login');
    }

    public function postLogin(Request $request){
       
        $administrador=new Administrador();
        $administrador->nombreUsuario=$request->input('usuario');
        $administrador->password=$request->input('password');

        
        if(Auth::guard('admin')->attempt(['nombreUsuario' =>$administrador->nombreUsuario,'password'=> $administrador->password])){
        	return redirect('admin/home')->with('usuario',$administrador->nombreUsuario);
        }	
        /*if(Auth::attempt($userdata))
        {            
            return 'Bienvenido';
        }*/

        /*$usuario= $request->input('usuario');
        $clave=$request->input('password');
		$user=DB::table('administradores')->where([
        			['nombreUsuario','=',$usuario],
        			['clave','=',$clave]
        				])->value('nombreUsuario');
		if($usuario==$user){
        	return view('inicioAdmin')->with('usuario',$user);
        }*/
        
        return redirect('admin/login')
                    ->with('mensaje_error','Tus datos son incorrectos')
                    ->withInput($request->except('password'));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login')->with('AdminClose','Sesion cerrada con exito');
    }
}
