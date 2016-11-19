<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
class Administrador extends Authenticatable
{
	protected $table='administradores';
    protected $fillable=['nombreUsuario','password'];
    protected $guarded=['id'];

}
