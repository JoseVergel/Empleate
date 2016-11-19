<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriaCargo extends Migration
{
    
    public function up()
    {
        Schema::create('categoria-cargo',function($table){

            $table->integer('idCargo')->unsigned();
            $table->integer('idCategoria')->unsigned();
            #$table->string('nombreCargo',40)->unique();            
            $table->timestamps();
            $table->primary(array('idCargo','idCategoria'));
            $table->foreign('idCargo')->references('idCargo')->on('cargos');
            $table->foreign('idCategoria')->references('idCategoria')->on('categorias');
        }); 
    }

    
    public function down()
    {
        Schema::drop('categoria-cargo');
    }
}
