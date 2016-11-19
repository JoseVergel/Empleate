<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categoria;
class categoriaController extends Controller
{

	public function __construct(){
      $this->middleware('IfNotIsAdmin');
    }
    public function createCategorias(){
    	return view('admin/categoriasCreate');
    }
    public function showCategorias(){
        $categorias=Categoria::all();
        return view('admin/categoriasShow',compact('categorias'));
    }
    public function storeCategorias(Request $request){
        $categorias=new Categoria();
    	$categorias->nombreCategoria=strtoupper($request->input('categoria'));

        $validate=Validator::make($request->all(),[
                'categoria'=>'required|max:40|unique:categorias,nombreCategoria'
            ]);

        if(!$validate->fails()){
            $categorias->save();
            return redirect()->back()->with('msj','Categoria registrada con exito.');
        }
        
    	return redirect()->back()->withErrors($validate);
    }

    public function editCategorias(Request $request){
        

        if($request->ajax()){
           $categorias=Categoria::find($request->id);
           $categorias->nombreCategoria=strtoupper($request->categoria);
           $categorias->save();

           return "modificado";
        } 
        return redirect('categoriasShow');
    }

    public function searchCategorias(Request $request){
        $search=strtoupper($request->search);
        $categorias=Categoria::where('nombreCategoria','LIKE','%'.$search.'%')->get();
        

        if($request->ajax()){
            return $categorias;
            /*return response()->json([
                'categorias'=>$categorias,
            ]);*/
        }    
        return redirect('categoriasShow');
    }
}
