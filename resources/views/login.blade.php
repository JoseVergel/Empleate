@extends('master')
@section('tittle')
	Login
@stop

@section('content')
	@if(Session::has('mensaje_error'))
		<div class="alert alert-danger">
	        {{ Session::get('mensaje_error') }}        
	    </div>
	@endif
	<h1>Login Cliente</h1>
	@if(Session::has('Close'))
		{{Session::get('Close')}}
	@endif
	@if(Session::has('registrado'))
		{{Session::get('registrado')}}
	@endif
	<form id="form_login" method="POST" action="login">
		<label>Usuario:</label>
		<input type="text" name="usuario" class="form-control" value="{{old('usuario')}}" autofocus>
		<label>Password:</label>
		<input type="password" name="password" class="form-control">
		<input type="checkbox" name="remember"> Recordarme
		<a href="{{URL('registro')}}">Registrate</a>
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="submit" value="Ingresar" class="btn btn-primary" id="btn_login">
	</form>

@stop