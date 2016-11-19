@extends('master')
@section('tittle')
	Login Administrador
@stop
@section('content')
@if(Session::has('mensaje_error'))
	<div class="alert alert-danger">
        {{ Session::get('mensaje_error') }}
    </div>
@endif
	<h1>Login de Administrador</h1>
	@if(Session::has('AdminClose'))
		{{Session::get('AdminClose')}}
	@endif
	<form id="form_login" method="POST" action="login">
		<label>Usuario:</label>
		<input type="text" name="usuario" class="form-control" value="{{old('usuario')}}" autofocus>
		<label>Password:</label>
		<input type="password" name="password" class="form-control">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="submit" value="Ingresar" class="btn btn-primary" id="btn_login">
	</form>

@stop