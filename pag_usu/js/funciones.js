

function agregardatos(nombre,apellido,email,telefono){

	cadena="nombre=" + nombre + 
			"&apellido=" + apellido +
			"&email=" + email +
			"&telefono=" + telefono;

	$.ajax({
		type:"POST",
		url:"php/agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				 $('#buscador').load('componentes/buscador.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor asd :(");
			}
		}
	});

}

function agregaform(datos){

	d = datos.split('||');

	$('#numfac').val(d[0]);
	$('#nombre').val(d[3]);
	$('#interes').val(d[10]);
	$('#fec_pag_int').val(d[11]);
	$('#iddoc').val(d[12]);
	
}

function agreganoti30(datos){

	d=datos.split('||');

	$('#numfacn30').val(d[0]);
	$('#nombren30').val(d[3]);
	$('#correocli30').val(d[20]);
	$('#fn30').val(d[17]);
	$('#iddoc').val(d[12]);
	
    
	
}
function agreganoti15(datos){

	d=datos.split('||');

	$('#numfacn15').val(d[0]);
	$('#nombren15').val(d[3]);
	$('#correocli15').val(d[20]);
	$('#fn15').val(d[18]);
	$('#iddoc').val(d[12]);
	
    
	
}
function agreganoti5(datos){

	d=datos.split('||');

	$('#numfacn5').val(d[0]);
	$('#nombren5').val(d[3]);
	$('#correocli5').val(d[20]);
	$('#fn5').val(d[19]);
	$('#iddoc').val(d[12]);
	
    
	
}

function actualizaDatos(){

	
	id=$('#iddoc').val();
	interes=$('#interes').val();
	fechapago=$('#fec_pag_int').val();
	id_hold=$('#hold').val();


	cadena= "id=" + id +
			"&interes=" + interes + 
			"&fechapago=" + fechapago;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php?hold='+id_hold);
				$('#tabla2').load('componentes/tabla2.php?hold='+id_hold);
				alertify.success("Actualizado con exito!");
			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});

}

function notificarCliente30(){


	id=$('#iddoc').val();
	fechanoti=$('#fn30').val();
	id_hold=$('#hold').val();
	


	cadena= "iddoc=" + id +
			"&fn30=" + fechanoti;


	$.ajax({
		type:"POST",
		url:"php/notificar.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php?hold='+id_hold);
				$('#tabla2').load('componentes/tabla2.php?hold='+id_hold);
				alertify.success("Notificado con exito!");
			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});

}
function notificarCliente15(){


	id=$('#iddoc').val();
	fechanoti=$('#fn15').val();
	id_hold=$('#hold').val();
	


	cadena= "iddoc=" + id +
			"&fn15=" + fechanoti;
	

	$.ajax({
		type:"POST",
		url:"php/notificar15.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php?hold='+id_hold);
				$('#tabla2').load('componentes/tabla2.php?hold='+id_hold);
				alertify.success("Notificado con exito!");
			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});

}
function notificarCliente5(){


	id=$('#iddoc').val();
	fechanoti=$('#fn5').val();
	id_hold=$('#hold').val();
	


	cadena= "iddoc=" + id +
			"&fn5=" + fechanoti;
	

	$.ajax({
		type:"POST",
		url:"php/notificar5.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php?hold='+id_hold);
				$('#tabla2').load('componentes/tabla2.php?hold='+id_hold);
				alertify.success("Notificado con exito!");
			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(asd");
				}
			}
		});
}

function factorizar(hold){

	idhold = hold;
	let valoresCheck = [];

	$("input[type=checkbox]:checked").each(function(){
		valoresCheck.push(this.value);
	});
	

	//alert(valoresCheck);
	if(valoresCheck.length==0){
		alertify.error("Ninguno Seleccionado");
	}else{
		alertify.success("Seleccionado");
		let cadena = [];
		for (let index = 0; index < valoresCheck.length; index++) {
			const element = valoresCheck[index];

			//alert("VALOR:"+valoresCheck[index]);
			
			if(index<valoresCheck.length){
				cadena.push("fa"+index+"="+valoresCheck[index]+"&");
			}else{
				cadena.push("fa"+index+"="+valoresCheck[index]);
			}
			
		}
		var formated = new String(cadena);
	
		formated = formated.replace(/[,]/g, function (m) { 
		 	return m === ',' ? '' : ''; 
		}); 

		location.href="../pag_usu/fact_varios.php?"+formated+"hold="+hold;
	}
}