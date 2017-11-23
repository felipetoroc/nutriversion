//mostrar registros



$(document).ready( function leer_registos(){			   

	var table = $('#example').DataTable({				

		 "ajax": "http://localhost/nutriversion/index.php/Categoria_alimento/categoria_data",					

		 "columns": [

			{ "data": "categoria_id"},

			{ "data": "categoria_descr"}

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

	

	//llamar form editar

			  

	$( "#editar" ).click(function() {

		document.getElementById('add').style.display = 'none';

		document.getElementById('feditar').style.display = 'block';

		var categoria_id = table.cell('.selected',0).data();

		var categoria_descr = table.cell('.selected',1).data();

		if (categoria_id != null){

	  $( "#dialog" ).dialog( "open" );

      $('#id_categoria').val(categoria_id);

		$('#descr_cate').val(categoria_descr);

		}else{

			alert("Debe seleccionar un registro");	

		}	

	

	});

			  

	//insertar sin refrescar

	$("#add").click(function(){

	

		id=$("#id_categoria").val();

		descr=$("#descr_cate").val();

		

		if(id!="" && descr!=""){

			$.ajax({

				url:"http://localhost/nutriversion/index.php/categoria_alimento/create",

				type:'POST',

				data:{id_categoria:id,descr_cate:descr},

				success:function(result){

					$("#mens").html(result);

					//table.ajax.reload();

					table.ajax.url ('http://localhost/nutriversion/index.php/Categoria_alimento/categoria_data') .load ();

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

		var categoria_id = table.cell('.selected',0).data();

		if (categoria_id != null){

		$.post("http://localhost/nutriversion/index.php/Categoria_alimento/eliminar_categoria", { categoria_id: categoria_id})

		  .done(function( data ) {

			$( "#result" ).html( data );

		});

        table.row('.selected').remove().draw( false );

		}else{

			alert("Debe seleccionar un registro");	

		}	

		

    });

	

	$("#feditar").click(function(){

	    id=$("#id_categoria").val();

		descr=$("#descr_cate").val();

		

         if(id!="" && descr!=""){

			$.ajax({

				url:"http://localhost/nutriversion/index.php/categoria_alimento/editar_categoria",

				type:'POST',

				data:{id_categoria:id,descr_cate:descr},

				success:function(result){

					$("#mens").html(result);

					table.ajax.url ('http://localhost/nutriversion/index.php/Categoria_alimento/categoria_data') .load ();	

					$("#dialog").dialog("close");

				}

			});

		}else{

			$("#mens").html("No deje campos vacios");

		}

		

		

	});

	

});

  