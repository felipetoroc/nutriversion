// JavaScript Document
$(document).ready(function() {
	var table = $('#table_id').DataTable({
		"sAjaxSource": "http://localhost/nutriversion/index.php/admin/usuarios_data",
		"columns": [{
			"data": "cliente_id"
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
			"data": "cliente_comuna_id"
		},
		{
			"data": "COMUNA_NOMBRE"
		},
		{
			"data": "cliente_direccion"
		},
		{
			"data": "cliente_usuario"
		},
		{
			"data": "cliente_email"
		},
		{
			"data": "cliente_celular"
		},
		{
			"data": "cliente_telefono"
		},
		{
			"data": "cliente_tipo"
		}],
		"columnDefs": [{
			"targets": [4],
			"visible": false
		},
		{
			"targets": [0],
			"visible": false
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
			$.post("http://localhost/nutriversion/index.php/admin/eliminar_usuario", {
				cliente_id: cliente_id
			}).done(function(data) {
				$("#result").html(data);
			});
			table.row('.selected').remove().draw(false);
		} else {
			alert("Debe seleccionar un registro");
		}
	});
	$('#nuevo').on('click', function() {
		$('#comboscomuna').hide();
		$('#guardar').hide();
		$('#insertar').show();
		$("#formulario").dialog("open");
		$('#formulario input:text').val("");
	});
	$('#editar').on('click', function() {
		$('#comboscomuna').hide();
		$('#insertar').hide();
		$('#guardar').show();
		var cliente_id = table.cell('.selected', 0).data();
		var cliente_nombre = table.cell('.selected', 1).data();
		var cliente_apellido = table.cell('.selected', 2).data();
		var cliente_fecha_nacimiento = table.cell('.selected', 3).data();
		var cliente_comuna_id = table.cell('.selected', 4).data();
		var comuna_nombre = table.cell('.selected', 5).data();
		var cliente_direccion = table.cell('.selected', 6).data();
		220
		var cliente_usuario = table.cell('.selected', 7).data();
		var cliente_email = table.cell('.selected', 8).data();
		var cliente_celular = table.cell('.selected', 9).data();
		var cliente_telefono = table.cell('.selected', 10).data();
		var cliente_tipo = table.cell('.selected', 11).data();
		$("#formulario").dialog("open");
		$('#id').val(cliente_id);
		$('#nombre').val(cliente_nombre);
		$('#apellido').val(cliente_apellido);
		$('#fecha_nacimiento').val(cliente_fecha_nacimiento);
		$('#comuna').val(cliente_comuna_id);
		$('#comunanombre').val(comuna_nombre);
		$('#direccion').val(cliente_direccion);
		$('#usuario').val(cliente_usuario);
		$('#email').val(cliente_email);
		$('#celular').val(cliente_celular);
		$('#telefono').val(cliente_telefono);
		$('#tipo').val(cliente_tipo);
	});
	$('#guardar').on('click', function() {
		var cliente_id = table.cell('.selected', 0).data();
		if (cliente_id != null) {
			$.post("http://localhost/nutriversion/index.php/admin/editar_usuario", $('#formCampos').serialize()).done(function(data) {
				$("#result").html(data);
				table.ajax.url('http://localhost/nutriversion/index.php/admin/usuarios_data').load();
				$("#formulario").dialog("close");
			});
		} else {
			alert("Debe seleccionar un registro");
		}
	});
	$('#insertar').on('click', function() {
		//if (cliente_id != null){
		$.post("http://localhost/nutriversion/index.php/admin/insertar_usuario", $('#formCampos').serialize()).done(function(data) {
			$("#result").html(data);
			table.ajax.url('http://localhost/nutriversion/index.php/admin/usuarios_data').load();
			$("#formulario").dialog("close");
		});
		//}else{
		//alert("Debe seleccionar un registro");	
		//}
	});
	$('#region').on('change', function() {
		$('#provincia option').remove();
		$('#cbcomuna option').remove();
		var region_id = $('#region').val();
		$.post("http://localhost/nutriversion/index.php/admin/provincia_data", {
			region_id: region_id
		}, function(data) {
			$('#provincia').append("<option value='0'>Seleccione...</option>");
			$.each(data, function(index, value) {
				$('#provincia').append("<option value='" + value.PROVINCIA_ID + "'>" + value.PROVINCIA_NOMBRE + "</option>");
			});
		}, 'json');
	});
	$('#provincia').on('change', function() {
		$('#cbcomuna option').remove();
		var provincia_id = $('#provincia').val();
		$.post("http://localhost/nutriversion/index.php/admin/comuna_data", {
			provincia_id: provincia_id
		}, function(data) {
			$('#comuna').append("<option value='0'>Seleccione...</option>");
			$.each(data, function(index, value) {
				$('#cbcomuna').append("<option value='" + value.COMUNA_ID + "'>" + value.COMUNA_NOMBRE + "</option>");
			});
		}, 'json');
	});
	$('#cbcomuna').on('change', function() {
		var comuna_id = $('#cbcomuna').val();
		var comuna_nombre = $('#cbcomuna option:selected').text();
		$('#comuna').val(comuna_id);
		$('#comunanombre').val(comuna_nombre);
		$('#comboscomuna').hide();
	});
	$('#btnMostrarComuna').on('click', function() {
		$('#comboscomuna').show();
	});
});