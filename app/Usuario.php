<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticable as AuthenticableTrait;
class Usuario extends Model implements Authenticatable 
{
    protected $fillable=['nombreUsuario','password','numeroContacto'];
    protected $guarded=['id'];
    protected $table = "usuarios";

    public function getAuthIdentifier(){
    	return $this->getKey();
    }
    public function getAuthPassword(){
    	return $this->password;
    }
    public function getRememberToken(){
    	return $this->{$this->getRememberTokenName()};
    }
    public function setRememberToken($value){
    	$this->{$this->getRememberTokenName()} = $value;
    }
    public function getRememberTokenName(){
    	return 'remember_token';
    }
    public function getAuthIdentifierName(){

    }
}
