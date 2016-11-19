<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav">
		<li><a href="{{URL('admin/home')}}" class="item">Inicio</a></li>
		<li class="dropdown" >
			<a href="#" class="dropdown-toggle item" data-toggle="dropdown" role="button">
				Categorias<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><a href="{{URL('admin/categorias/create')}}">Crear</a></li>
				<li><a href="{{URL('admin/categorias/show')}}">Ver</a></li>					
			</ul>
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle item" data-toggle="dropdown" role="button">
				Cargos<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><a href="{{URL('admin/cargos/create')}}">Crear</a></li>
				<li><a href="{{URL('admin/cargos/show')}}">Ver</a></li>					
			</ul>
		
		</li>		
	</ul>
	<a href="{{URL('admin/logout')}}" class="navbar-text navbar-right">Logout</a>	
</div>


