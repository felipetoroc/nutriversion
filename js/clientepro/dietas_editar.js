// JavaScript Document

$(document).ready(function(){
    $("#resultado").hide();
    $("label[contenteditable=true]").on("blur",function(){
        var id_dieta = $('#id_dieta').text();
        var ids = $(this).attr("id").split(';');
        var id_comida = ids[0];
        var id_categoria = ids[1];
        var valor = $(this).text();
        var nombre = $('#nombre_dieta').val();
        if($.isNumeric(valor) & valor >= 0 & valor <= 10){
            $("#mensajeValidacion").html("");
            $.post( window.location.origin+"/nutriversion/index.php/clientepro/modificar_dieta", {id_dieta:id_dieta,id_comida:id_comida,id_categoria:id_categoria,porcion:valor,nombre_dieta:nombre});
            $.post( window.location.origin+"/nutriversion/index.php/clientepro/getCaloriasDieta", {id_dieta:id_dieta})
                  .done(function( data ) {
                        $("#calorias").html(Math.round(data));
                  });
        }else{
            $("#mensajeValidacion").html("Debe ingresar ser un valor numérico.");
        }
    });

    $("#nombre_dieta").on("blur",function(){
        var id_dieta = $('#id_dieta').text();
        var nombre = $('#nombre_dieta').val();
        if (nombre.length > 3){
            $.post( window.location.origin+"/nutriversion/index.php/clientepro/modificar_dieta", {id_dieta:id_dieta,nombre_dieta:nombre})
			  .done(function( data ) {
				$( "#resultado" ).html(data);
			});
        }
    });

    $("#confirmar").on("click",function(){
        var id_dieta = $('#id_dieta').text();
        $.post( window.location.origin+"/nutriversion/index.php/clientepro/confirmar_dieta", {id_dieta:id_dieta})
			  .done(function(data){
				$("#resultado").html(data).show(500,function(){
				    $("#resultado").delay(3000).hide(500);
				});
                
			});
    });
    $("label[contenteditable=true]").keypress(function(e) {
        if (e.which == 13 | e.which == 32) {
            return false;
        }
    });
});

