<div class="large-8 large-centered medium-10 columns">
    <div class="row">
        <div class="large-12 medium-12 columns">
            <h3>Datos físicos <?=$this->session->userdata('nombre_cliente')." ".$this->session->userdata('apellido_cliente')  ?></h3>
        </div>
    </div>
    <FORM action="<?=base_url()?>index.php/clientepro/nuevo_estado" method="post" id="formDatosFisicos">
    <div class="row">
    	<div class="large-6 medium-6 columns">
                <p>Altura (cms)</p>
                <input type="text" name="Altura" id="Altura" minlength="2" maxlength="3" required>
                <p>Peso (kg)</p>
                <input type="text" name="Peso" id="Peso" minlength="2" maxlength="5" required>
                <p>Cuello (cms)</p>
                <input type="text" name="Cuello" id="Cuello" minlength="2" maxlength="3" required>
                <p>Cintura (cms)</p>
                <input type="text" name="Cintura" id="Cintura" minlength="2" maxlength="3" required>
        </div>
        <div class="large-6 medium-6 columns">
             <p>Cadera (cms)</p>
                <input type="text" name="Cadera" id="Cadera" minlength="2" maxlength="3" required>
                 
                <p>Factor de actividad: </p>
                <select name="factor" required>
                 <option value="">Seleccione</option>
                 <option value="1.2">Sedentario</option>
                 <option value="1.375">Actividad ligera</option>
                 <option value="1.55">Actividad moderada</option>
                 <option value="1.725">Actividad intensa</option>
                 <option value="1.9">Actividad muy intensa</option>
                 </select>
                 <p>Objetivo</p>
                <select id="objetivo" name="objetivo" required>
                 <option value="">Seleccione objetivo...</option>
                 <?php foreach ($objetivos as $objetivo){
                    echo "<option value='".$objetivo["id_objetivo"]."'>".$objetivo["descr_objetivo"]."</option>";
                 }
                 ?>                
                </select>
                <p>Enfermedad (Opcional)</p>
                <select name="enfermedad">
                 <option value="">Seleccione enfermedad...</option>
                 <?php foreach ($enfermedades as $enfermedad){
                    echo "<option value='".$enfermedad["id_enfermedad"]."'>".$enfermedad["nombre"]."</option>";
                 }
                 ?>
                </select>
                <p>Alergia (Opcional)</p>
                <select name="enfermedad">
                 <option value="">Seleccione alergia...</option>
                 <?php foreach ($alergias as $alergia){
                    echo "<option value='".$alergia["id_alergia"]."'>".$alergia["nombre"]."</option>";
                 }
                 ?>
                </select>
        </div>

    </div>
    <div class="row">
        <div class="large-12 medium-12 columns">
            <p class="text-center">
                <INPUT type="submit" class="button tiny" value="Cargar Físico"> 
                <INPUT type="reset" class="button tiny"  value="Limpiar">
            </p>
        </div>
    </div>
    </FORM>
</div>
<script>
        $("#formDatosFisicos").validate({
             rules: {
                  Altura: {
                      noSpace: true,
                      digits: true,
                      range: [30, 250]
                  },
                  Peso: {
                      noSpace: true,
                      decimal: true,
                      range: [30, 400]
                  },
                  Cuello: {
                      noSpace: true,
                      digits: true,
                      range: [20, 100]
                  },
                  Cintura: {
                      noSpace: true,
                      digits: true,
                      range: [50, 500]
                  },
                  Cadera: {
                      noSpace: true,
                      digits: true,
                      range: [50, 500]
                  }
               }
        });
    </script>