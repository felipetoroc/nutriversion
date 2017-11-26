<div class="large-6 large-centered columns">
    <div class="panel">
        <div>
            <?php
                echo "<p style='color:red'>".$this->session->flashdata('error')."</p>";
            ?>
            <!-- Inicio formulario de login -->
            <p class="text-center">Registro Nuevo Paciente</p>
            <form method="post" action="<?=base_url()?>index.php/Registro/registrar" id="formRegistro">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" minlength="2" maxlength="15" placeholder="Diego" required>
                <label>Apellido Paterno</label>
                <input type="text" name="apellidop" minlength="2" maxlength="15" placeholder="Gonzales" required>
                <label>Apellido Materno</label>
                <input type="text" name="apellidom" minlength="2" maxlength="15" placeholder="Sanchez" required>
                <label>Rut</label>
                <input type="text" name="rut" minlength="8" maxlength="12" placeholder="11111111-1" required>
                <label>Fecha Nacimiento</label>
                <input type="text" name="fechaNac" id="datepicker" placeholder="1991/09/17" required>
                <label>Email</label>
                <input type="email" name="mail" placeholder="ejemplo@gmail.com" required>
                <label>Telefono Contacto</label>
                <input type="number" name="telefono" minlength="9" maxlength="9" placeholder="99999999" required>
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
                <input type="text" name="direccion" minlength="3" maxlength="50" placeholder="Avenida Vicuña Mackenna 2100 dpto 404" required>
                <label>Sexo</label>
                <INPUT type="radio" name="sexo" value="1" required> Hombre <br>
                <INPUT type="radio" name="sexo" value="2" required> Mujer <br>
                
                <input type="submit" class="button tiny radius" value="Registrarme">
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
        $("#formRegistro").validate({
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
            $.post("http://localhost/nutriversion/index.php/registro/provincia_data", {
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
            $.post("http://localhost/nutriversion/index.php/registro/comuna_data", {
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