//mostrar registros



$(document).ready( function leer_registos(){			   

	var table = $('#example').DataTable({				

		 "ajax": window.location.origin+"/nutriversion/index.php/dietas/dieta_cabecera_data",					

		 "columns": [

			{ "data": "id_dieta"},

			{ "data": "nombre"},

			{ "data": "total_calorias"}

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

				

				

	//llamar form

			 

	$( "#opener" ).click(function() {

	  	$( "#dialog" ).dialog( "open" );

		document.getElementById('feditar').style.display = 'none';

		document.getElementById('add').style.display = 'block';

	});

	

	

	//insertar sin refrescar

	$("#add").click(function(){

	

		id_dieta=$("#id_dieta").val();

		nombre=$("#nombre").val();

		total=$("#tot_calorias").val();

		

		

		if(id_dieta!="" && nombre!=""){

			$.ajax({

				url:"http://nutriversion.com/index.php/dietas/create_dieta_cabecera",

				type:'POST',

				data:{id_dieta:id_dieta,nombre:nombre,total:total},

				success:function(result){

					$("#mens").html(result);

					//table.ajax.reload();

					table.ajax.url ('http://nutriversion.com/index.php/dietas/dieta_cabecera_data') .load ();

					$("#dialog").dialog("close");

				}

			});

		}else{

			$("#mens").html("No deje campos vacios");

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

	

	

	

	//eliminar registro de datatable

	$('#eliminar').click( function () {

		var id_dieta = table.cell('.selected',0).data();

		if (id_dieta != null){

		$.post("http://nutriversion.com/index.php/Categoria_alimento/eliminar_dieta_cabecera", { id_dieta: id_dieta})

		  .done(function( data ) {

			$( "#result" ).html( data );

		});

        table.row('.selected').remove().draw( false );

		alert("dato eliminado...");

		}else{

			alert("Debe seleccionar un registro");	

		}	

		

    });

	

	

	

	//llamar form editar

			  

	$( "#editar" ).click(function() {

		document.getElementById('add').style.display = 'none';

		document.getElementById('feditar').style.display = 'block';

		var id_dieta = table.cell('.selected',0).data();

		var nombre = table.cell('.selected',1).data();

		var tot = table.cell('.selected',2).data();

		if (id_dieta != null){

	  $( "#dialog" ).dialog( "open" );

      $('#id_dieta').val(id_dieta);

	  $('#nombre').val(nombre);

	  $('#tot_calorias').val(tot);

		}else{

			alert("Debe seleccionar un registro");	

		}	

	

	});

	

	//editar en la bd

	$("#feditar").click(function(){

	    id_dieta=$("#id_dieta").val();

		nombre=$("#nombre").val();

		tot=$("#tot_calorias").val();

		

         if(id_dieta!="" && nombre!=""){

			$.ajax({

				url:"http://nutriversion.com/index.php/dietas/editar_dieta_cabecera",

				type:'POST',

				data:{id_dieta:id_dieta,nombre:nombre,tot:tot},

				success:function(result){

					$("#mens").html(result);

					table.ajax.url ('http://nutriversion.com/index.php/dietas/dieta_cabecera_data') .load ();	

					$("#dialog").dialog("close");

				}

			});

		}else{

			$("#mens").html("No deje campos vacios");

		}

		

		

	});

			  

	

	

	});

  