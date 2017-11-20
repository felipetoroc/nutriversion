$(document).ready(function() {

    var tabla = $('#tabla').DataTable({
        dom: 'frt',
        sAjaxSource: "http://localhost/nutriversion/index.php/clientepro/getClientes",
        responsive : true,
        columns: [
            { data: "cliente_id" , visible : false},
            { data: "cliente_nombre"},
            { data: "cliente_apellido"}
        ]
    });
    $('#tabla tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            $('#nombre').html("");
        }
        else {
            tabla.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $.post( "http://localhost/nutriversion/index.php/clientepro/getClientebyid", {id_cliente:tabla.cell('.selected',0).data()})
                .done(function( data ) {
                    console.log(data);
                    var obj = $.parseJSON(data);
                    $("#id_cliente").val(obj[0].cliente_id);
                    $("#nombre_cliente").val(obj[0].cliente_nombre);
                    $("#apellido_cliente").val(obj[0].cliente_apellido);
                    $("#niv_actividad").html(obj[0].nivel_actividad);
                    $("#altura").html(obj[0].altura);
                    $("#peso").html(obj[0].peso);
                    $("#imc").html(obj[0].imc);
                    $("#gr_corporal").html(obj[0].porcentaje_grasa);
                    $("#cons_cal_diario").html(obj[0].ccd);
                    if (obj[0].id_dieta == null){
                        $("#resultBusquedaDieta").html("No hay datos para mostrar");
                    }else{
                        $.each(obj,function(key, value){
                            if (value.porciones > 0){
                                $("#"+value.id_comida+"-"+value.id_categoria).html("<strong>"+value.porciones+"</strong>");
                            }else{
                                $("#"+value.id_comida+"-"+value.id_categoria).html(value.porciones);
                            }

                        });
                    }
                });
        }
    });
    $("#btnAsignarDieta").on('click',function(){
        var id_cliente = $("#id_cliente").val();
        var nombre_cliente = $("#nombre_cliente").val();
        var apellido_cliente = $("#apellido_cliente").val();
        if ($("#id_cliente").val() != ""){
            $.post( "http://localhost/nutriversion/index.php/clientepro/setFlashDataIdCliente", {id_cliente:id_cliente,nombre_cliente:nombre_cliente,apellido_cliente:apellido_cliente})
                .done(function(data){
                    $( location ).attr("href", data);
                });
        }else{
            $('#myModal').foundation('reveal', 'open');
        }
    });
});