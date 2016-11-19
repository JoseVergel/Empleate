var EM=false;//Exclusion Mutua
$(document).ready(function(){

	$("#Tipo").on('change',function(){
		var tipo=$("#Tipo").val();		
		if(tipo=="pj"){
			$("#tipoJ").css("display","block");
			$("#tipoN").css("display","none");
		}else{			
			$("#tipoJ").css("display","none");
			$("#tipoN").css("display","block");			
		}
	});


	$("#table").on('click','.edit',function(){
		btn=$(this);
		if(!EM){
			EM=true;
			td=btn.parent().siblings('.categoria')
			categoria=td.text().trim();
			input=$('<input>',{value:categoria,id:'editable'});
			td.html(input);
			input.focus();

			btn.attr('class','btn btn-primary hidden');
			btn.siblings('.btn-success').attr('class','btn btn-success acept');			
		}else{
			alert('No es permitido editar mas de un campo a la vez');
		}
		
	});

	$('#table').on('click','.acept',function(){
		btn=$(this);	

		categoria=$('#editable').val().toUpperCase();		
		tr=btn.parent().parent();
		id=tr.data("id"); 
		token=$('meta[name="csrf-token"]').attr('content');
			
		$.post('/admin/categorias/edit',{id:id,'categoria':categoria,'_token':token},function(data){
			
			btn.attr('class','btn btn-success hidden');
			btn.siblings().attr('class','btn btn-primary edit');
			td.html('');
			td.text(categoria);
			EM=false;
		}).fail(function(data){
			$("#cont").html(data.responseText);
		});
	});

	$("#buscar").on("click",function(){		
		data=$("#form_search").serialize();		
		buscar(data);
	});

	$("#orden").on('change',function(){
		
		id=$("#orden").val();
		token=$('meta[name="csrf-token"]').attr('content');
		$.post('/admin/cargos/show',{id:id,'_token':token},function(response){
			table="<table class='table table-hover' id='tblCategoria'>";			
			table+="<tr><th>Nombre Cargo</th><th>Categoria</th><th>Accion</th></tr>";		
			
			$.each(response,function(key,value){				
				cargos=response[key].cargos;				
				$.each(cargos,function(i,item){
					table+="<tr data-id="+response[key].idCategoria+">";
					table+="<td>";
					table+=cargos[i].nombreCargo+"\n";
					table+="</td>";
					table+="<td class='cargos'>"+response[key].nombreCategoria+"</td>";
					table+="<td><button type='button' class='btn btn-primary edit'>Modificar</button>";
					table+="<button type='button' class='btn btn-success hidden'>Aceptar</button></td></tr>";
				});			
				
			});

		
			table+="</table>";
			$("#table").html(" ");
			$("#table").html(table);	
		
		},'json').fail(function(error){
			$("#cont").html(error.responseText);
		});
	});
	

});

function buscar(data){

	/*$.post('search',function(response){
		alert(response);
	});*/
	$.ajax({
		url:'search',
		data:data,
		type:'post',
		datatype:'text',
		success:function(datos){			
			table="<table class='table table-hover' id='tblCategoria'>";			
			table+="<tr><th>Nombre Categoría</th><th>Accion</th></tr>";

			td_button="<td>"+
			"<button type='button' class='btn btn-primary edit'>Modificar</button>"+
			"<button type='button' class='btn btn-success hidden'>Aceptar</button>"+
			"</td>";
			//alert(datos);
			for(var i in datos){
				table+="<tr data-id="+datos[i].idCategoria+"><td class='categoria'>"+datos[i].nombreCategoria+"</td>"+td_button+"</tr>";
			}

			table+="</table>";
			
			$("#table").html(" ");
			$("#table").html(table);			
			
		},
		error:function(error){
			$("#cont").html(error.responseText);		
		}


	});
}

function edit(id,data){

}

