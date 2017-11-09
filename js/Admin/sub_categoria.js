// JavaScript Document

// mostrar datos 

$(document).ready( function leer_registos(){			   
	var table = $('#example').DataTable({				
		 "ajax": "http://nutriversion.com/index.php/Categoria_alimento/sub_categoria_data",					
		 "columns": [
			{ "data": "sub_cate_id"},
			{ "data": "sub_cate_descr"},
			{ "data": "categoria_id"}
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
	
	$( "#opener" ).click(function() {
	  	$( "#dialog" ).dialog( "open" );
		document.getElementById('feditar').style.display = 'none';
		document.getElementById('add').style.display = 'block';
	});
	
	
	//insertar sin refrescar
	$("#add").click(function(){
	
		id_sub_cate=$("#sub_cate_id").val();
		descr=$("#sub_cate_descr").val();
		id_cate=$("#categoria_id").val();
		
		
		if(id_sub_cate!="" && descr!=""){
			$.ajax({
				url:"http://nutriversion.com/index.php/categoria_alimento/create_sub_cate",
				type:'POST',
				data:{sub_cate_id:id_sub_cate,sub_cate_descr:descr,categoria_id:id_cate},
				success:function(result){
					$("#mens").html(result);
					//table.ajax.reload();
					table.ajax.url ('http://nutriversion.com/index.php/Categoria_alimento/sub_categoria_data') .load ();
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
		var sub_cate_id = table.cell('.selected',0).data();
		if (sub_cate_id != null){
		$.post("http://nutriversion.com/index.php/Categoria_alimento/eliminar_sub_categoria", { sub_cate_id: sub_cate_id})
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
		var sub_cate_id = table.cell('.selected',0).data();
		var descr = table.cell('.selected',1).data();
		var categoria_id = table.cell('.selected',2).data();
		if (categoria_id != null){
	  $( "#dialog" ).dialog( "open" );
      $('#sub_cate_id').val(sub_cate_id);
	  $('#sub_cate_descr').val(descr);
	  $('#categoria_id').val(categoria_id);
		}else{
			alert("Debe seleccionar un registro");	
		}	
	
	});
	
	//editar en la bd
	$("#feditar").click(function(){
	    id=$("#sub_cate_id").val();
		descr=$("#sub_cate_descr").val();
		categoria_id=$("#categoria_id").val();
		
         if(id!="" && descr!=""){
			$.ajax({
				url:"http://nutriversion.com/index.php/categoria_alimento/editar_sub_categoria",
				type:'POST',
				data:{sub_cate_id:id,sub_cate_descr:descr,categoria_id:categoria_id},
				success:function(result){
					$("#mens").html(result);
					table.ajax.url ('http://nutriversion.com/index.php/Categoria_alimento/sub_categoria_data') .load ();	
					$("#dialog").dialog("close");
				}
			});
		}else{
			$("#mens").html("No deje campos vacios");
		}
		
		
	});
			  
	
	

});