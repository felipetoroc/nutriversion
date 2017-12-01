$(document).ready(function() {

    var tabla = $('#tabla').DataTable({
        dom: 'frtp',
        sAjaxSource: window.location.origin+"/nutriversion/index.php/clientepro/getClientes",
        language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
        pagingType: "simple",
        responsive : true,
        columns: [
            { data: "cliente_id" , visible : false},
            { data: "cliente_rut"},
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
            $.post( window.location.origin+"/nutriversion/index.php/clientepro/getClientebyid", {id_cliente:tabla.cell('.selected',0).data()})
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
                        $(".porciones").html("");
                        $("#resultBusquedaDieta").html("No hay datos para mostrar");
                    }else{
                        $("#resultBusquedaDieta").html("");
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
        var ccd = $("#cons_cal_diario").html();
        var btn = "dieta";
        if ($("#niv_actividad").html() != ""){
            $.post( window.location.origin+"/nutriversion/index.php/clientepro/setFlashDataIdCliente", {id_cliente:id_cliente,nombre_cliente:nombre_cliente,apellido_cliente:apellido_cliente,ccd:ccd,btn:btn})
                .done(function(data){
                    $( location ).attr("href", data);
                });
        }else{
            $("#textModal").html("No puede asignar una dieta a un paciente que no tiene su estado físico.")
            $('#myModal').foundation('reveal', 'open');
        }
    });
    $("#btnActualizarEstado").on('click',function(){
        var cliente_seleccionado = tabla.cell('.selected',1).data();
        var id_cliente = $("#id_cliente").val();
        var nombre_cliente = $("#nombre_cliente").val();
        var apellido_cliente = $("#apellido_cliente").val();
        var btn = "estado";
        if(cliente_seleccionado != null){
            $.post( window.location.origin+"/nutriversion/index.php/clientepro/setFlashDataIdCliente", {id_cliente:id_cliente,nombre_cliente:nombre_cliente,apellido_cliente:apellido_cliente,btn:btn})
                .done(function(data){
                    $( location ).attr("href", data);
                });  
        }else{
            $("#textModal").html("Debe seleccionar un paciente.")
            $('#myModal').foundation('reveal', 'open');
        }
    });
});