<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresas extends Migration
{
   
    public function up()
    {
        Schema::create('empresas',function($table){

            $table->integer('id')->unsigned();
            $table->string('nombreEmpresa',30);
            $table->string('direccionE',50);
            $table->timestamps();
            /*Constraints*/
            $table->primary('id');
            $table->foreign('id')->references('id')->on('usuarios');
        });
    }

    public function down()
    {
       Schema::drop('empresas'); 
    }
}
