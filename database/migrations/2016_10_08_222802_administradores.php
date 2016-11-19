<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Administradores extends Migration
{
    
    public function up()
    {
        Schema::create('administradores',function($table){

            $table->increments('id');
            $table->string('nombreUsuario')->unique();
            $table->string('password',60);
            $table->rememberToken();
            $table->timestamps();

        });
    }

    
    public function down()
    {
        Schema::drop('administradores');
    }
}
