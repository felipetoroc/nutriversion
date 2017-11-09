// JavaScript Document



    

		$(document).ready(function() {			   

			var table =  $('#example').dataTable( {				

				"ajax": "http://localhost/nutriversion/index.php/Categoria_alimento/producto_data",					

					 "columns": [

					    { "data": "ID_SUBCATE" },

						{ "data": "ID_ALIMENTO" },

						{ "data": "ALIMENTO" },

						{ "data": "Cantidad_gramos" },

						{ "data": "Humedad" },

						{ "data": "Calorias" },

						{ "data": "Proteinas_g" },

						{ "data": "Hidratos_g" },

						{ "data": "Fibra_Dietaria_g" },

						{ "data": "Lipidos_g" },

						{ "data": "Saturados_g" },

						{ "data": "Monoinsat_g" },

						{ "data": "Polieinsat_g" },

						{ "data": "Colesterol_mg" },

						{ "data": "omega_6_g" },

						{ "data": "omega_3_g" },

						{ "data": "Caroteno_ER" },

						{ "data": "Retinol_ER" },

						{ "data": "Vitamina_AER" },

						{ "data": "Vit_B1_mg" },

						{ "data": "Vit_B2_mg" },

						{ "data": "Niacina_mg" },

						{ "data": "Vit_B6_mg" },

						{ "data": "Vit_B12_mg" },

						{ "data": "Folatos_mcg" },

						{ "data": "Pantotenico_mg" },

						{ "data": "Vit_C_mg" },

						{ "data": "Vit_E_mg" },

						{ "data": "Calcio_mg" },

						{ "data": "Cobre_mg" },

						{ "data": "Hierro_mg" },

						{ "data": "Magnesio_mg" },

						{ "data": "Fosforo_mg" },

						{ "data": "Potasio_mg" },

						{ "data": "Selenio_mcg" },

						{ "data": "Sodio_mg" },

						{ "data": "Zinc_mg" }

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

					

					$( "#opener" ).click(function() {

						$( "#dialog" ).dialog( "open" );

						document.getElementById('feditar').style.display = 'none';

						document.getElementById('add').style.display = 'block';

					});

					

					

				$('#add').on( 'click', function(){

	       	

				 ID_SUBCATEt         =$("#ID_SUBCATE").val(); 

				 ID_ALIMENTOt        =$("#ID_ALIMENTO").val();

		if ( ID_SUBCATEt!= "" && ID_ALIMENTOt != ""){

			$.post( "http://nutriversion.com/index.php/categoria_alimento/create_producto", $('#formCampos').serialize())

			  .done(function( data ) {

				$( "#result" ).html(data);

				$("#mens").html(result);

				table.ajax.url ('http://nutriversion.com/index.php/Categoria_alimento/producto_data').load();	

				$("#formulario").dialog("close");

			});

		}else{

			$("#mens").html("No deje campos vacios");

		}

	});

						 

									 

	

				

				

			});



