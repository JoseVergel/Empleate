<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cargos extends Migration
{
   
    public function up()
    {
        Schema::create('cargos',function($table){

            $table->increments('idCargo');
            $table->string('nombreCargo',40)->unique();            
            $table->timestamps();

        });
    }

    
    public function down()
    {
        Schema::drop('cargos');
    }
}
