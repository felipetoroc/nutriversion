// JavaScript Document
$(document).ready(function(){   
	var table = $('#table_id').DataTable( {				
		"sAjaxSource": "http://nutriversion.com/index.php/admin/usuarios_data",					
		"columns": [
			{ "data": "cliente_id" },
			{ "data": "cliente_nombre" },
			{ "data": "cliente_apellido" }
			]
	});
});
