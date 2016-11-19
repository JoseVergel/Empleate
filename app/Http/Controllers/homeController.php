<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class homeController extends Controller
{
    public function __construct(){

    	/*
    		Si el Cliente intenta acceder al home sin estar logueado
			será redireccionado a la vista del login
    	*/
    	$this->middleware('EsCliente');
    }

    public function show(){
    	return view('home');
    }

    
    
}
