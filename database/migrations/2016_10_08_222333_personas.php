<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Personas extends Migration
{
  
    public function up()
    {
       Schema::create('personas',function($table){
            
            $table->integer('id')->unsigned()->primary();
            $table->string('nombre');
            $table->string('apellido');
            $table->enum('tipoDocumento',['TI','CC','CE']);
            $table->integer('numeroDocumento');
            $table->string('email');                       
            $table->timestamps();

            $table->foreign('id')->references('id')->on('usuarios');
       }); 
    }

    
    public function down()
    {
       Schema::drop('personas'); 
    }
}
