<div class="large-9 medium-9 columns">
    <div class="row">
    	<div class="large-6 medium-6 columns">
             <p>Datos Fisicos</p>
                <FORM action="<?=base_url()?>index.php/cliente/nuevo_estado" method="post">
                <LABEL>Edad: </LABEL>
                          <INPUT type="text" name="edad">
                <LABEL>Altura: </LABEL>
                <select name="Altura" id="Altura" class="texto">
                 <option>Seleccione medida Altura...</option>
					<?PHP
                    for ($i = 120; $i <= 220; $i++) {
                        echo'<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
                    }
                    ?>
                    </select>
                <LABEL>Peso: </LABEL>
                <select name="Peso" id="Peso" class="texto">
                          <?PHP
							for ($i = 30; $i <= 200; $i++) {
								echo'<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
							}
							?>
                </select>
                <LABEL>Cintura: </LABEL>
                 <select name="Cintura" id="Cintura" class="texto">
                 <option>Seleccione medida cintura...</option>
						<?PHP
                        for ($i = 10; $i <= 200; $i++) {
                            echo'<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
                        }
                        ?>
                 </select>
                <LABEL>Cuello: </LABEL>
                <select name="Cuello" id="Cuello" class="texto">
                          <option>Seleccione medida cuello...</option>
							<?PHP
                            for ($i = 10; $i <= 100; $i++) {
                                echo'<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
                            }
                            ?>
                 </select>
                 
                 
                 <LABEL>Tamaño de cadera: </LABEL>   
                 <select name="cadera" id="cadera" class="texto">        
                            <option>Seleccione medida cadera...</option>
								<?PHP
                                for ($i = 10; $i <= 200; $i++) {
                                    echo'<OPTION VALUE="'.$i.'">'.$i.'</OPTION>';
                                }
                                ?>
                 </select>
                <LABEL>Factor de Actividad: </LABEL>
                <select name="factor">
                 <option value="">Seleccione</option>
                 <option value="1.2">Sedentario</option>
                 <option value="1.375">Actividad Ligera</option>
                 <option value="1.55">Actividad Moderada</option>
                 <option value="1.725">Actividad Intensa</option>
                 <option value="1.9">Actividad Muy Intensa</option>
                 </select>
                 

                 
                <INPUT type="submit" value="Enviar"> <INPUT type="reset">
             </FORM>
        </div>
        <div class="large-6 medium-6 columns">
             
        </div>
    </div>
    <div class="row">
        <div class="large-6 medium-6 columns">
            
        </div>
        <div class="large-6 medium-6 columns">
            
        </div>
    </div>
</div>