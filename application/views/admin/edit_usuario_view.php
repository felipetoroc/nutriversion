<div class="large-12 large-centered columns">
    <div class="row">
        <div class="large-7 large-centered columns">
            <div class="row">
                <h3 class="text-center" style="color:green">Formulario Edición de Usuario</h3>
            </div>
            <div class="row">
                <?php if($this->session->flashdata('error')){ ?>
                <p class="text-center" style="color:red"><?=$this->session->flashdata('error')?></p>
                <?php } ?>
            </div>
            <form id="formCampos" method="post" action="<?=base_url()?>index.php/admin/editar">
            <input type="hidden" name="cliente_id" value="<?=$datos_usuario->cliente_id?>">
            <div class="row">
                <div class="large-6 columns">
                        <label>Nombre</label>
                        <input type="text" value="<?=$datos_usuario->cliente_nombre?>" id="nombre" name="nombre" minlength="2" maxlength="15" placeholder="Diego" required>
                        <?php 
                        $apellidos = explode(" ", $datos_usuario->cliente_apellido);
                        ?>
                        <label>Apellido Paterno</label>
                        <input type="text" value="<?=$apellidos[0]?>" name="apellidop" minlength="2" maxlength="15" placeholder="Gonzales" required>
                        <label>Apellido Materno</label>
                        <input type="text" value="<?php echo (isset($apellidos[1]))?$apellidos[1]:"" ?>" name="apellidom" minlength="2" maxlength="15" placeholder="Sanchez" required>
                        <label>Rut</label>
                        <input type="text" value="<?=$datos_usuario->cliente_rut?>" name="rut" minlength="8" maxlength="12" placeholder="11111111-1" readonly>
                        <label>Fecha Nacimiento</label>
                        <input type="text" value="<?=date_format(date_create($datos_usuario->cliente_fecha_nacimiento),'d/m/Y')?>" name="fechaNac" id="datepicker" placeholder="17/09/2017" required>
                        <label>Email</label>
                        <input type="email" value="<?=$datos_usuario->cliente_email?>" name="mail" placeholder="ejemplo@gmail.com" readonly>
                        <label>Telefono Contacto</label>
                        <input type="number" value="<?=$datos_usuario->cliente_telefono?>" name="telefono" minlength="9" maxlength="9" placeholder="99999999" required>
                </div>
                <div class="large-6 columns">
                        <div id="comboscomuna">
                            <label>Región</label>
                            <select name="region" id="region" required>
                                <option value="0">Seleccione Región...</option>
                                <?php foreach ($regiones as $row){ ?>
                                    <option value="<?=$row->REGION_ID;?>"><?=$row->REGION_NOMBRE;?></option>
                                <?php } ?>
                            </select>
                            <span class="input-group-addon"></span>
                            <label>Provincia</label>
                            <select name="provincia" id="provincia"></select>
                            <label>Comuna</label>
                            <select name="id_comuna" id="id_comuna">
                                <option value="<?=$datos_usuario->COMUNA_ID?>"><?=$datos_usuario->COMUNA_NOMBRE?></option>
                            </select>
                        </div>
                        <label>Dirección</label>
                        <input type="text" value="<?=$datos_usuario->cliente_direccion?>" name="direccion" minlength="3" maxlength="50" placeholder="Avenida Vicuña Mackenna 2100 dpto 404" required>
                        <label>Sexo</label>
                        <?php if($datos_usuario->cliente_sexo == 1){
                        ?>
                        <INPUT type="radio" name="sexo" value="1" checked="checked" required> Hombre <br>
                        <INPUT type="radio" name="sexo" value="2" required> Mujer <br>
                        <?php }else{
                        ?>
                        <INPUT type="radio" name="sexo" value="1" required> Hombre <br>
                        <INPUT type="radio" name="sexo" value="2" checked="checked" required> Mujer <br>
                        <?php }
                        ?>
                        <?php if ($datos_usuario->peso == null){ ?>
                            <?php if ($datos_usuario->id_cliente != null){ ?>
                            <input type="hidden" name="tipo_usuario" value="<?=$datos_usuario->cliente_tipo?>">
                            <?php }else{?>
                            <label>Permisos de Usuario</label>
                            <select name="tipo_usuario" id="tipo_usuario" required> 
                                <option value="">Seleccionar Permiso</option>
                                <?php if($datos_usuario->cliente_tipo == 1){ ?>
                                    <option value="1" selected>Paciente</option>
                                    <option value="2">Profesional</option>
                                    <option value="3">Administrador</option>
                                <?php } ?>
                                <?php if($datos_usuario->cliente_tipo == 2){ ?>
                                    <option value="1">Paciente</option>
                                    <option value="2" selected>Profesional</option>
                                    <option value="3">Administrador</option>
                                <?php } ?>
                                <?php if($datos_usuario->cliente_tipo == 3){ ?>
                                    <option value="1">Paciente</option>
                                    <option value="2">Profesional</option>
                                    <option value="3" selected>Administrador</option>
                                <?php } ?>
                            </select>
                            <?php } ?>  
                            <div id="divsucursal">
                                <label>Sucursal</label>
                                <select name="sucursal"> 
                                    <option value="">Seleccionar Sucursal</option>
                                    <?php foreach ($sucursales as $row){ ?>
                                        <option value="<?=$row->idSucursal;?>"><?=$row->NombreSucursal;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php }else{ ?>
                            <input type="hidden" name="tipo_usuario" value="<?=$datos_usuario->cliente_tipo?>">
                        <?php } ?>
                </div>
            </div>
            <div class="row">
                <input class="small button" type="submit" value="Listo">
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#formCampos").validate({
         rules: {
              nombre: {
                  noSpace: true,
                  lettersonly: true
              },
              apellidop:{
                noSpace: true,
                lettersonly: true
              },
              apellidom:{
                noSpace: true,
                lettersonly: true
              },
              rut: {
                noSpace:true
              },
              fechaNac:{
                dateUS:true
              }
        }
    });
    $('#region').on('change', function() {
        $('#provincia option').remove();
        $('#id_comuna option').remove();
        var region_id = $('#region').val();
        $.post(window.location.origin+"/nutriversion/index.php/admin/provincia_data", {
            region_id: region_id
        }, function(data) {
            $.each(data, function(index, value) {
                $('#provincia').append("<option value='" + value.PROVINCIA_ID + "'>" + value.PROVINCIA_NOMBRE + "</option>");
            });
        }, 'json');
    });
    $('#provincia').on('change', function() {
        $('#id_comuna option').remove();
        var provincia_id = $('#provincia').val();
        $.post(window.location.origin+"/nutriversion/index.php/admin/comuna_data", {
            provincia_id: provincia_id
        }, function(data) {
            $.each(data, function(index, value) {
                $('#id_comuna').append("<option value='" + value.COMUNA_ID + "'>" + value.COMUNA_NOMBRE + "</option>");
            });
        }, 'json');
    });
    if ($('#tipo_usuario').val() == 1){
         $('#divsucursal').hide();
    }
    $('#tipo_usuario').on('change',function(){
        
        if ($(this).val() == 3 | $(this).val() == 2){
            $('#divsucursal').show();
        }
        if ($(this).val() == 1){
            $('#divsucursal').hide();
        }
    });
</script>