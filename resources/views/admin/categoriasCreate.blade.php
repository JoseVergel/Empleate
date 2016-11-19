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
		<h3>Categorias</h3>
		
		@if(Session::has('msj'))
			{{Session::get('msj')}}
		@endif
		<form action="{{URL('admin/categorias/create')}}" method="post">
			<label>Categoria:</label>
			<input type="text" name="categoria">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="submit" class="btn" value="Crear">
		</form>
	</div>	
@stop