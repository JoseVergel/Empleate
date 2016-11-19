<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    
    public function up()
    {
        Schema::create('usuarios',function($table){
            
            $table->increments('id')->unsigned();
            $table->string('nombreUsuario')->unique();
            $table->string('password',60);
            $table->string('numeroContacto');
            $table->rememberToken();
            $table->timestamps();
        });
    }

   
    public function down()
    {
       Schema::drop('usuarios');
    }
}
