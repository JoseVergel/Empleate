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
		<h3>Categorias</h3>
		
		<div id="panel">
			<form action="{{url('admin/search')}}" method="post" id="form_search">
				<input type="text" name="search" id="search">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="button" value="Buscar" class="btn" id="buscar">
			</form>
		</div>
		<div id="table">
			<table class="table table-hover" id="tblCategoria">			
				<tr>
					<th>Nombre Categoría</th>
					<th>Accion</th>
				</tr>

				@foreach($categorias as $categoria)
					<tr data-id="{{$categoria->idCategoria}}">
						<td class="categoria">
						{{$categoria->nombreCategoria}}
						</td>
						<td>
							<button type="button" class="btn btn-primary edit">Modificar</button>
							<button type="button" class="btn btn-success hidden">Aceptar</button>
						</td>
					</tr>
				@endforeach	

			</table>
		</div>
	</div>

@stop