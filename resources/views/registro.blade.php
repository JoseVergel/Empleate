@extends('master')
@section('tittle')
	Registro
@stop
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
	<form id="form_registro" name="form_registro" method="post" action="registro">
	
        <label for="usuario">Usuario</label>                
        <input type="text" id="usuario" name="usuario" value="{{ old('usuario') }}">                
		<label for="password">Contraseña</label>                
        <input type="password" id="password" name="password">							
        <label for="re-clave">Repetir Contraseña</label>
        <input type="password" id="re-password" name="password_confirmation">
        <label for="numero_de_contacto">numero de contacto</label>                
        <input type="text" id="numeroContacto" name="numeroContacto" value="{{ old('numeroContacto')}}">                
        <label>Tipo de Usuario</label>
        <select id="Tipo" name="tipo">
            <option value="pn">Persona Natural</option>
            <option value="pj">Persona Juridica</option>
        </select>
        <div id="tipoN">                	
            <label for="nombre">Nombre</label>                 
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">                 
            <label for="usuario">Apellido</label>                
            <input type="text" id="apellido" name="apellido" >			 
		    <label for"tipo_de_documento">tipo de documento</label>				 			
            <select id="tipo_de_documento" name="tipo_de_documento" >
            	<option value="">Seleccione tipo de documento</option>
                <option value="TI">Tarjeta de Identidad </option>
				<option value="CC">Cédula de Ciudadanía </option>
				<option value="CE">Cédula de Extranjería </option>                
            </select>			 
			<label for="numero_de_documento">numero de documento</label>			 
			<input type="text" id="numero_de_documento" name="numeroDocumento">
			<label for="email">Email</label>
			<input type="email" name="email">
		</div>
		<div id="tipoJ" style="display:none">
			<label for="nombreEmpresa">Nombre de la empresa</label>	
			<input type="text" id="nombreEmpresa" name="nombreEmpresa" >		
			<label for="direccion">Dirrecion del establecimiento</label>	
			<input type="text" id="direccionE" name="direccionE" >
		</div>
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="submit" id="btn_Registrar" value="Registrar" class="btn btn-primary">			
    </form>
@stop