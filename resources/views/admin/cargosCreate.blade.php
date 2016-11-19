@extends('master')
@section('tittle')
	Crear Categoría
@stop
@section('nav')
	@include('partials.navAdmin')
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
@if(Session::has('mensaje_error'))
	<div class="alert alert-danger">
        {{ Session::get('mensaje_error') }}
    </div>
@endif
	<div id="cont">
		<h3>Cargos</h3>
		
		@if(Session::has('msj'))
			{{Session::get('msj')}}
		@endif
		<form action="{{URL('admin/cargos/create')}}" method="post" id="formCargos">
			<label>Cargo:</label>
			<input type="text" name="cargo" class="campo">
			<label >Categoria:</label>
			<select name="selectCategorias" id="" class="campo">
				<option value="">Seleccione una Categoria</option>	
				@foreach($categorias as $categoria)			
					<option value="{{$categoria->idCategoria}}">{{$categoria->nombreCategoria}}</option>
				@endforeach			
			</select>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="submit" class="btn col-md-offset-9 btn-primary" value="Ingresar" id="btnCargo">
		</form>
	</div>	
@stop