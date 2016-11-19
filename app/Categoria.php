<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table='categorias';
    protected $fillable=['nombreCategoria'];
    protected $guarded=['idCategoria'];
    protected $primaryKey='idCategoria';

    public function Cargos(){
    	return $this->belongsToMany('App\Cargo','Categoria-Cargo','idCategoria','idCargo');

    }

}
