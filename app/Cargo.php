<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table='cargos';
    protected $fillable=['nombreCargo'];
    protected $guarded=['idCargo'];
    protected $primaryKey='idCargo';

    public function Categorias(){
    	return $this->belongsToMany('App\Categoria','Categoria-Cargo','idCargo','idCategoria');
    }
}
