// JavaScript Document
$(document).ready(function() {
	var table = $('#table_id').DataTable({
		"sAjaxSource": window.location.origin+"/nutriversion/index.php/admin/usuarios_data",
		"columns": [{
			"data": "cliente_id",
			visible: false
		},
		{
			"data": "cliente_rut"
		},
		{
			"data": "cliente_nombre"
		},
		{
			"data": "cliente_apellido"
		},
		{
			"data": "cliente_fecha_nacimiento"
		},
		{
			"data": "cliente_comuna_id",
			visible: false
		},
		{
			"data": "COMUNA_NOMBRE"
		},
		{
			"data": "cliente_direccion"
		},
		{
			"data": "cliente_usuario",
			visible:false
		},
		{
			"data": "cliente_email"
		},
		{
			"data": "cliente_celular",
			visible:false
		},
		{
			"data": "cliente_telefono"
		},
		{
			"data": "cliente_tipo",
			visible:false
		},
		{
			"data": "tipo_cliente_descl"
		}]
	});
	$("#formulario").dialog({
		autoOpen: false,
		resizable: false,
		modal: true,
		width: 'auto',
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
	$('#table_id tbody').on('click', 'tr', function() {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		} else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
	//eliminar registro de datatable
	$('#eliminar').click(function() {
		var cliente_id = table.cell('.selected', 0).data();
		if (cliente_id != null) {
			$("#dialog-confirm").dialog({
		      resizable: false,
		      height: "auto",
		      width: 400,
		      modal: true,
		      closeText: "",
		      buttons: {
		        "Eliminar": function() {
		        	$( this ).dialog( "close" );
		          	$.post(window.location.origin+"/nutriversion/index.php/admin/eliminar_usuario", {cliente_id: cliente_id})
		          	.done(function(data){
		          		if(data != "0"){
		          			$("#tituloModal").html("Éxito!");
							$("#mensajeModal").html("Usuario eliminado con éxito.");
							$('#myModal').foundation('reveal', 'open');
							table.row('.selected').remove().draw(false);
		          		}else{
		          			$("#tituloModal").html("Error!");
							$("#mensajeModal").html("No puede eliminar su usuario");
							$('#myModal').foundation('reveal', 'open');
		          		}
		          	});
		        },
		        Cancel: function() {
		          $( this ).dialog( "close" );
		        }
		      }
		    });
		} else {
			$("#tituloModal").html("Advertencia!");
			$("#mensajeModal").html("Debe seleccionar un usuario de la lista.");
			$('#myModal').foundation('reveal', 'open');
		}
	});

	$('#editar').on('click', function() {
		var cliente_id = table.cell('.selected', 0).data();
		if (cliente_id != null) {
			$( location ).attr("href", window.location.origin+"/nutriversion/index.php/admin/newEditUsuario/"+cliente_id);
		}else{
			$("#tituloModal").html("Advertencia!");
			$("#mensajeModal").html("Debe seleccionar un usuario de la lista.");
			$('#myModal').foundation('reveal', 'open');
		}
	});
});