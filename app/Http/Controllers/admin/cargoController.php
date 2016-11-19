<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cargo;
use App\Categoria;
use App\Categoria_Cargo;
use App\Http\Controllers\admin\DB;
class cargoController extends Controller
{
   public function __construct(){
      $this->middleware('IfNotIsAdmin');
    }
    public function showCargos(){
        $cargos=Cargo::orderBy('nombreCargo','ASC')->get();
        //$cargos=Cargo::orderBy('created_at')->get();
        //return dd($cargos);
       return view('admin/cargosShow')->with('cargos',$cargos);
        /*$cargos=Cargo::whereHas('Categorias',function($query){
                        $query->orderBy('nombreCategoria','ASC');
                        $query->addSelect('nombreCategoria');
                    })->get(['idCargo','nombreCargo']); 
                   
                    $arr=array();                    
                    $d=0;
                    foreach ($cargos as $cargo) {
                        $cargo->Categorias;                       
                        $arr[$d]=$cargo;
                        $d++;
                    }  
                    $cargos=$arr;   
        return dd($cargos);*/
        //$categorias=Categoria::has('Cargos')->get();
        
    }
    public function showCargos2(Request $request){
    
        $retorno="";
        if($request->ajax()){           
            switch ($request->id) {
                case '0':
                    $retorno=Cargo::orderBy('nombreCargo','ASC')->get();  
                    break;
                case '1':                    
                    $categorias=Categoria::whereHas('Cargos',function($query){         
                        $query->addSelect('nombreCargo');
                    })->orderby('nombreCategoria')->get();
                    $arr=array();                    
                    $d=0;
                    foreach ($categorias as $categoria) {
                        $categoria->Cargos;                       
                        $arr[$d]=$categoria;
                        $d++;
                    }  
                    $retorno=$arr;             
                    break;
                case '2':
                    $cargos=Cargo::orderBy('created_at')->get();
                    break;
                
                default:
                    
                    break;
            }
            return json_encode($retorno);
        } 
        return redirect('cargosShow');
    }
    public function createCargos(){
        $categorias=Categoria::all();
    	return view('admin/cargosCreate',compact('categorias'));
    }

    public function storeCargos(Request $request){
    	$cargos=new Cargo();
    	$cargos->nombreCargo=strtoupper($request->input('cargo'));        
        $idCategoria=$request->input('selectCategorias');
        
    	$validate=Validator::make(
            ['cargo'=>$request->input('cargo')],
            ['cargo'=>'required|max:40',]);

    	if(!$validate->fails()){ 

            $unico=Validator::make($request->all(),[
                'cargo'=>'unique:cargos,nombreCargo',                
            ]);
            if($unico->fails()){
                $cargos=Cargo::where('nombreCargo','like',strtoupper($cargos->nombreCargo))->first();
                if(Categoria_Cargo::whereRaw('idCargo=? and idCategoria=?',[$cargos->idCargo,$idCategoria])->exists()){
                    return redirect()->back()->withErrors(['error'=>'Ya existe el cargo con esa categoria']); 
                }else{                             
                    $cc=new Categoria_Cargo();            
                    $cc->idCargo=$cargos->idCargo;            
                    $cc->idCategoria=$idCategoria; 
                    $cc->save();
                    return redirect()->back()->with('msj','Cargo registrado con exito.');
                }
                
            }else{
                $cargos->save();            
                $cc=new Categoria_Cargo();            
                $cc->idCargo=$cargos->idCargo;            
                $cc->idCategoria=$idCategoria;                         
                $cc->save();
                return redirect()->back()->with('msj','Cargo registrado con exito.');
            }
            
        }
        
    	return redirect()->back()->withErrors($validate);
    }
}
