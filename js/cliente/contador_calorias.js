//mostrar registros
$(document).ready( function leer_registos(){			   
	var table = $('#example').DataTable({"ajax": window.location.origin+"/nutriversion/index.php/Cliente/contador_data",					
		 "columns": [
		    { "data": "ID_ALIMENTO"},
		    { "data": "categoria_descr"},
		    { "data": "sub_cate_descr"},
			{ "data": "ALIMENTO"},
			{ "data": "Cantidad_gramos"},
			{ "data": "Calorias"}
			]
	});

	//funcion del form animation 
	$( "#dialog" ).dialog({
	  autoOpen: false,
	  show: {
		effect: "blind",
		duration: 1000
	  },
	  hide: {
		effect: "explode",
		duration: 1000
	  }
	});

	//seleccionar registro de datatable

	$('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
  
	$( "#editar" ).click(function() {
		$.post( window.location.origin+"/nutriversion/index.php/cliente/contador_contador_cabecera").done();
		var id_alimento = table.cell('.selected',0).data();
		var nombre_alimento = table.cell('.selected',3).data();
		var porcion = table.cell('.selected',4).data();
		var calorias = table.cell('.selected',5).data();
		if (id_alimento != null){
	  $( "#dialog" ).dialog( "open" );
      $('#num').val(id_alimento);
	  $('#alimento').val(nombre_alimento);
	  $('#porcion').val(porcion);
	  $('#tot').val(calorias);
		}else{
			alert("Debe seleccionar un registro");	
		}	
	});

	$('#cantidad').on('change',function(){
		 var cantidad = $('#cantidad').val();
		 var total =  $('#tot').val();
		 var  result = cantidad * total;
		 $('#result').val(result);
	});

	//insertar sin refrescar
	$("#add").click(function(){
		comida=$("#tipo_comida").val();
		id=$("#num").val();
		cantidad=$("#cantidad").val();
		tot_calorias=$("#result").val();
		if(comida!="" && id!=""){
			$.ajax({
				url:window.location.origin+"/nutriversion/index.php/cliente/contador_detalle",
				type:'POST',
				data:{id_comida:comida,id_alimento:id,cantidad:cantidad,total_calorias:tot_calorias},
				success:function(result){
					$("#mens").html(result);
					//table.ajax.reload();
					table.ajax.url ('http://localhost/nutriversion/index.php/Cliente/contador_data') .load ();
					$("#dialog").dialog("close");
					$('#ingresoContador').foundation('reveal', 'open');
				}
			});
		}else{
			$("#mens").html("No deje campos vacios");
		}
	});
});