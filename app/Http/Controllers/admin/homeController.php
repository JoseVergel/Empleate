<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function __construct(){
      $this->middleware('IfNotIsAdmin');
    }
	public function index(){
    	return view('admin/home');
    }
    

    
}

