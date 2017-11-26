// JavaScript Document

$(document).ready(function(){   

	var table_dietas = $('#table_dietas').DataTable({
		sAjaxSource: "http://localhost/nutriversion/index.php/clientepro/dietas_data",
        responsive : true,
		columns: [
			{
				data: "id_dieta",
				visible: false
			},
			{ data: "nombre"},
			{ data: "fecha_creacion" },
            { data: "fecha_modificacion" },
            { data: "estado" },
            { data: "creado_por" }
		]
	});

	$('#table_dietas tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
			$('#id_dieta').val("");
			$('#nombre_dieta').val("");
        }
        else {
            table_dietas.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
			$('#id_dieta').val(table_dietas.cell('.selected',0).data());
			$('#nombre_dieta').val(table_dietas.cell('.selected',1).data());
        }
    });
	
	$("#editar").on('click',function(){
		
		var dieta_seleccionada = table_dietas.cell('.selected',0).data();
		if(dieta_seleccionada != null){
		  $("#formEnvEditar").submit();
		}else{
				$('#selecionarDieta').foundation('reveal', 'open');
		}
		
	});
	
	$("#eliminar").on('click',function(){
		var dieta_seleccionada = table_dietas.cell('.selected',0).data();
		if(dieta_seleccionada != null){
			$.post( "http://localhost/nutriversion/index.php/clientepro/eliminar_dieta", {id_dieta:dieta_seleccionada})
			  .done(function( data ) {
				$( "#result" ).html( data );
				$('#dietaEliminada').foundation('reveal', 'open');
                table_dietas.ajax.url('http://localhost/nutriversion/index.php/clientepro/dietas_data').load();
			});
			
		}else{
			$('#selecionarDieta').foundation('reveal', 'open');
		}
	});

    $("#nuevo" ).click(function() {
        var nuevo = $("#nuevo").val();
		
       $.post( "http://localhost/nutriversion/index.php/clientepro/crear_dieta", {nuevo:nuevo})
		  .done(function( data ) {
			$( "#resultado" ).html( data );
			$('#dietaCreada').foundation('reveal', 'open');
            table_dietas.ajax.url('http://localhost/nutriversion/index.php/clientepro/dietas_data').load();
		});
        
	});
    $("#btnAsignarDietaA").on('click',function(){
        var id_dieta = table_dietas.cell('.selected',0).data();
        var id_cliente = $("#id_cliente").val();
        if(id_dieta != null){
        	if (id_cliente != ""){
            	$.post( "http://localhost/nutriversion/index.php/clientepro/asignarDietaACliente", {id_cliente:id_cliente,id_dieta:id_dieta})
					.done(function(data){
						$( location ).attr("href", data);
					});
			}
        }else{
            $('#myModal2').foundation('reveal', 'open');
        }
    });
});