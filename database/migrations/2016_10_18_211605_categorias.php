<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categorias extends Migration
{
   
    public function up()
    {
        Schema::create('categorias',function($table){

            $table->increments('idCategoria');
            $table->string('nombreCategoria',40)->unique();            
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::drop('categorias');
    }
}
