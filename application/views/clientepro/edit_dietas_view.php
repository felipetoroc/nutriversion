<script type="text/javascript" src="<?php echo base_url() ?>js/clientepro/dietas_editar.js"></script>

<div class="large-12 medium-12 columns">
    <div class="row">
        <div class="large-6 medium-6 columns">
            <a class="button" href="<?=base_url()?>index.php/clientepro/dietas">OK</a>
        </div>
        <div class="large-6 medium-6 columns">
        <label style="display:none" id="id_dieta"><?php foreach($datos_dieta_cabecera as $row_dieta_cabecera){echo $row_dieta_cabecera['id_dieta'];}?></label>
            Nombre de la dieta:
            <input id="nombre_dieta" value="<?php foreach($datos_dieta_cabecera as $row_dieta_cabecera){echo $row_dieta_cabecera['nombre'];}?>">
            <label id="mensajeValidacion" class="w3-text-red"></label>
        </div>
        <!--<input class="button tiny" type="button" name="confirmar" id="confirmar" value="Confirmar Dieta">-->
    </div>
    <div class="row">
        <div class="large-6 medium-6 columns">
            <?php if($this->session->userdata('id_cliente')){
            ?>
             <div class="row">
                <div class="large-6 medium-6 columns">
                    <h3>Consumo Calórico Recomendado: </h3>
                </div>
                <div class="large-6 medium-6 columns">
                    <h3 style="color:blue"><?=round($this->session->userdata("ccd"))?></h3>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="large-6 medium-6 columns">
                    <h3>Calorías de la Dieta: </h3>
                </div>
                <div class="large-6 medium-6 columns">
                    <h3 style="color:green" id="calorias"><?=round($calorias)?></h3>
                </div>
            </div>
        </div>
        <div class="large-6 medium-6 columns">
            <table>
                <thead>
                <tr>
                    <td>Grupo de Categorias</td>
                   <?php
                   foreach ($columnas as $columna){
                        echo "<td>".$columna['nombre']."</td>";
                   }?>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($filas as $fila){
                        echo "<tr><td>".$fila['categoria_descr']."</td>";
                        for($columna = 1;$columna <= 5;$columna++){
                            echo "<td><label id='".$columna.";".$fila['categoria_id']."' contenteditable='true' required>";
                            foreach ($datos_dieta as $row){
                                if($row['id_comida'] == $columna and $row['id_categoria'] == $fila['categoria_id']){
                                    echo $row['porciones'];                            
                                }
                            }
                            echo "</label></td>";    
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>