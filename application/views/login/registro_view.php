<div class="large-6 large-centered columns">
    <div class="panel">
        <div>
            <?php
                echo "<p style='color:red'>".$this->session->flashdata('error')."</p>";
            ?>
            <!-- Inicio formulario de login -->
            <p class="text-center">Registro Nuevo Usuario</p>
            <form method="post" action="<?=base_url()?>index.php/Registro/registrar" id="formRegistro">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" minlength="2" placeholder="Diego" required>
                <label>Apellidos</label>
                <input type="text" name="apellidos" minlength="2" placeholder="Gonzales Sanchez" required>
                <label>Rut</label>
                <input type="text" name="rut" minlength="8" maxlength="12" placeholder="11111111-1" required>
                <label>Fecha Nacimiento</label>
                <input type="text" name="fechaNac" id="datepicker" placeholder="1991/09/17" required>
                <label>Email</label>
                <input type="email" name="mail" placeholder="ejemplo@gmail.com" required>
                <label>Telefono Contacto</label>
                <input type="number" name="telefono" minlength="9" maxlength="9" placeholder="99999999" required>
                <label>Sexo</label>
                <INPUT type="radio" name="sexo" value="1" required> Hombre <br>
                <INPUT type="radio" name="sexo" value="2" required> Mujer <br>
                <LABEL>Objetivo </LABEL>
                 <select name="objetivo" required>
                        <option value="">Seleccione objetivo...</option>
                        <?php
                        foreach($objetivos as $row){
                            echo "<OPTION VALUE='".$row->id_objetivo."'>".$row->descr_objetivo."</OPTION>";
                        }
                        ?>
                    </select>
                <input type="submit" class="button tiny radius" value="Registrarme">
            </form>
        </div>
    </div>
    <script>
        $( function() {
        $( "#datepicker" ).datepicker({
            minDate: "-100Y", 
            maxDate: "-5Y", 
            changeYear: true
        });
      } );
        $("#formRegistro").validate({
             rules: {
                  nombre: {
                      noSpace: true
                  },
                  apellidos:{
                    noSpace: true
                  },
                  rut: {
                    noSpace:true
                  },
                  fechaNac:{
                    date:true
                  }
               }
        });
    </script>
</div>