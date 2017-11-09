// JavaScript Document



//mostrar registros



$(document).ready( function leer_registos(){			   

	var table = $('#example').DataTable({"ajax": "http://localhost/nutriversion/index.php/Cliente/ver_contador_data",					

		 "columns": [

		    { "data": "id_detalle","visible": false},

		    { "data": "cliente"},

			{ "data": "fecha"},

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

		$.post("http://localhost/nutriversion/index.php/Cliente/eliminar_detalle_contador", { id_detalle: id_detalle})

		  .done(function( data ) {

			$( "#result" ).html( data );

		});

        table.row('.selected').remove().draw( false );

		}else{

			alert("Debe seleccionar un registro");	

		}	

		

    });

	

	

	$('#fecha_detalle').on('change', function () {

		var fecha_detalle = $('#fecha_detalle').val();

		

		$.post("http://localhost/nutriversion/index.php/Cliente/asignar_fecha_detalle", { fecha_detalle: fecha_detalle})

		 .done(function( data ) {

			table.ajax.reload();

		});

        

		

		

    });

	

	

	

});