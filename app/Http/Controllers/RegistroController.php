<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Usuario;
use App\Persona;
use App\Empresa;

class RegistroController extends Controller
{
     public function show(){
        return view('registro');
    }

    public function store(Request $request){

    	$data=$request->all();

    	$usuario=new Usuario;
		$usuario->nombreUsuario=$request->input('usuario');
		//$usuario->clave=encrypt($request->input('clave'));
        $usuario->password=Hash::make($request->input('password'));
		$usuario->numeroContacto=$request->input('numeroContacto');
		$tipoUsuario=$request->get('tipo');  	


    	if($tipoUsuario=='pn'){

    		$validate=Validator::make($data,[
	    		'usuario'=>'required|max:255|unique:usuarios,nombreUsuario',
	    		'password'=>'required|min:3|confirmed',
	    		'password_confirmation'=>'required|min:3',
	    		'numeroContacto'=>'required|numeric', 
	    		'nombre'=>'required|string|min:3',
	    		'apellido'=>'required|string',
	    		'tipo_de_documento'=>'in:TI,CC,CE',
	    		'numeroDocumento'=>'required|numeric',
	    		'email'=>'email'   		
    		]);
	    	

	    	$persona=new Persona;

			$persona->nombre=$request->input('nombre');
			$persona->apellido=$request->input('apellido');
			$persona->tipoDocumento=$request->get('tipo_de_documento');
			$persona->numeroDocumento=$request->input('numeroDocumento');
			$persona->email=$request->input('email');

	    	if(!$validate->fails()){
    			$usuario->save();
    			$persona->id=$usuario->id;
    			$persona->save();
    			return redirect('login')->with('registrado','Registrado con exito');
    		}else{               
    			return redirect()
                        ->back()
    					->withErrors($validate)
    					->withInput()->except('password');
    		} 

	    	
			

    	}elseif ($tipoUsuario=='pj') {
    		$validate=Validator::make($data,[
    			'usuario'=>'required|max:255|unique:usuarios,nombreUsuario',
    			'password'=>'required|min:3|confirmed',
    			'password_confirmation'=>'required|min:3',
    			'numeroContacto'=>'required|numeric',
    			'nombreEmpresa'=>'required|max:30',
    			'direccionE'=>'max:50'    		
    		]);    		

    		$empresa=new Empresa;
			$empresa->nombreEmpresa=$request->input('nombreEmpresa');
			$empresa->direccionE=$request->input('direccionE');
			

			if(!$validate->fails()){
    			$usuario->save();
    			$empresa->id=$usuario->id;
    			$empresa->save(); 
    			return redirect('login')->with('registrado','Registrado con exito');   				
    		}else{
    			return redirect('registro')
                        ->back()
    					->withErrors($validate)
                        ->withInput($request->except('clave'));
    		} 

    	}else{
    		return redirect('registro');
    	} 

		
    }
}
