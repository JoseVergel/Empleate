@extends('master')
@section('tittle')
	Crear Categoría
@stop
@section('scripts')
	<script src="{{asset('js/')}}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('nav')
	@include('partials.navAdmin')
@stop
@section('content')

	<div id="cont">
		<h3>Cargos</h3>
		
		<div id="panel">
			Ordenar por:
			<form action="{{url('admin/cargo')}}" method="post" id="form_orden">
				<select name="orden" id="orden">
					<option value="0" selected="selected">Orden Alfabetico</option>
					<option value="1">Categorias</option>
					<option value="2">Mas recientes</option>				
				</select>				
			</form>
		</div>
		<div id="table">
			<table class="table table-hover" id="tblCategoria">			
				<tr>
					<th>Nombre Cargo</th>
					<th>Categoria</th>
					<th>Accion</th>
				</tr>
				

				@foreach($cargos as $cargo)
					
					@foreach($cargo->Categorias as $categoria)
					<tr data-id="$cargo->idCargo">
						<td class="cargos">
						{{$cargo->nombreCargo}}						
						</td>
						<td>
						{{$categoria->nombreCategoria}}	
						</td>
						<td>
							<button type="button" class="btn btn-primary edit">Modificar</button>
							<button type="button" class="btn btn-success hidden">Aceptar</button>
						</td>
					</tr>
					@endforeach	
				@endforeach	

			</table>
		</div>
	</div>

@stop