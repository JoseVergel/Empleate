@extends('master')
@section('tittle')
	Bienvenido
@stop
@section('nav')
	@include('partials.navCliente')
@stop
@section('content')
	<div id="cont">
		<h3>Bienvenido:</h3>
		<a href="logout">Logout</a>
	</div>	
@stop