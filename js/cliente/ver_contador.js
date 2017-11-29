$(document).ready( function leer_registos(){			   
	var table = $('#example').DataTable({"ajax": window.location.origin+"/nutriversion/index.php/Cliente/ver_contador_data",					
		 "columns": [
		    { "data": "id_detalle","visible": false},
		    { "data": "cliente","visible":false},
			{ "data": "fecha"},
			{ "data": "cateDesc"},
			{ "data": "subDesc"},
			{ "data": "comida"},
			{ "data": "alimento"},
			{ "data": "cantidad"},
			{ "data": "calorias"}
			]
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

		//eliminar registro de datatable

	$('#delete').click( function () {
		var id_detalle = table.cell('.selected',0).data();
		if (id_detalle != null){
		$.post(window.location.origin+"/nutriversion/index.php/Cliente/eliminar_detalle_contador", { id_detalle: id_detalle})
		  .done(function( data ) {
			$( "#result" ).html( data );
		});

        table.row('.selected').remove().draw( false );
		}else{
			$("#modalTitle").html("Error!");
			$("#mensajeError").html("Para eliminar un alimento debe seleccionarlo en la lista.");
			$('#myModal').foundation('reveal', 'open');

		}	
    });

	$('#fecha_detalle').on('change', function () {
		var fecha_detalle = $('#fecha_detalle').val();
		$.post(window.location.origin+"/nutriversion/index.php/Cliente/asignar_fecha_detalle", { fecha_detalle: fecha_detalle})
		 .done(function( data ) { 
			table.ajax.reload();
		});
    });
    $('#btnMostrarTodo').on('click', function () {
		$.post(window.location.origin+"/nutriversion/index.php/Cliente/desasignar_fecha_detalle");
		$('#fecha_detalle').val("");
		table.ajax.reload();
    });
});