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

	



});