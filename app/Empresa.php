<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable=['nombreEmpresa','direccionE'];
    protected $guarded=['id'];
}
