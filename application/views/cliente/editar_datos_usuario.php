<div class="large-6 columns">
    <div class="panel">
        <div>
            <?php
                echo "<p style='color:red'>".$this->session->flashdata('error')."</p>";
            ?>
            <!-- Inicio formulario de login -->
            <p class="text-center">Actualización datos de usuario</p>
            <form method="post" action="<?=base_url()?>index.php/Cliente/editUser" id="formActualizar">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" value="<?=$this->session->userdata('nombre')?>" minlength="2" maxlength="15" required>
                <?php 
                $apellidos = explode(" ", $this->session->userdata("apellido"));
                ?>
                <label>Apellido Paterno</label>
                <input type="text" name="apellidop" value="<?=$apellidos[0]?>" minlength="2" maxlength="15" required>
                <label>Apellido Materno</label>
                <input type="text" name="apellidom" value="<?=$apellidos[1]?>" minlength="2" maxlength="15" required>
                <label>Fecha Nacimiento</label>
                <input type="text" name="fechaNac" value="<?=$this->session->userdata('fechaNac')?>" id="datepicker" required>
                <label>Email</label>
                <input type="email" name="mail" value="<?=$this->session->userdata('email')?>" required>
                <label>Telefono Contacto</label>
                <input type="number" name="telefono" value="<?=$this->session->userdata('telefono')?>" minlength="9" maxlength="9" required>
                <LABEL>Región</LABEL>
                <div id="comboscomuna">
                    <select name="region" id="region">
                    <option value="0">Seleccione...</option>
                    <?php foreach ($regiones as $row){ ?>
                        <option value="<?=$row->REGION_ID;?>"><?=$row->REGION_NOMBRE;?></option>
                    <?php } ?>
                    </select>
                    <span class="input-group-addon"></span>
                    <select name="provincia" id="provincia"></select>
                    <select name="id_comuna" id="id_comuna"></select>
                </div>
                </select>
                <label>Dirección</label>
                <input type="text" name="direccion" value="<?=$this->session->userdata('direccion')?>" minlength="3" maxlength="50" required>
                
                <input type="submit" class="button tiny radius" value="Actualizar">
            </form>
        </div>
    </div>
    <script>
        $(function(){
            $("#datepicker").datepicker({
                minDate: "-100Y", 
                maxDate: "-5Y", 
                changeYear: true
            });
        });
        $("#formActualizar").validate({
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
                    date:true
                  }
               }
        });
        $('#region').on('change', function() {
            $('#provincia option').remove();
            $('#cbcomuna option').remove();
            var region_id = $('#region').val();
            $.post("http://localhost/nutriversion/index.php/cliente/provincia_data", {
                region_id: region_id
            }, function(data) {
                $('#provincia').append("<option value='0'>Seleccione...</option>");
                $.each(data, function(index, value) {
                    $('#provincia').append("<option value='" + value.PROVINCIA_ID + "'>" + value.PROVINCIA_NOMBRE + "</option>");
                });
            }, 'json');
        });
        $('#provincia').on('change', function() {
            $('#id_comuna option').remove();
            var provincia_id = $('#provincia').val();
            $.post("http://localhost/nutriversion/index.php/cliente/comuna_data", {
                provincia_id: provincia_id
            }, function(data) {
                $('#id_comuna').append("<option value='' required>Seleccione...</option>");
                $.each(data, function(index, value) {
                    $('#id_comuna').append("<option value='" + value.COMUNA_ID + "'>" + value.COMUNA_NOMBRE + "</option>");
                });
            }, 'json');
        });
    </script>
</div>