<script type="text/javascript" src="<?php echo base_url() ?>js/clientepro/dietas_editar.js"></script>

<div class="large-12 columns">
    <div class="w3-container w3-yellow" id="resultado"></div>
    <div class="row">
        <a href="<?=base_url()?>index.php/clientepro/dietas">Atras</a>
        <input class="button tiny" type="button" name="confirmar" id="confirmar" value="Confirmar Dieta">
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label style="display:none" id="id_dieta"><?php foreach($datos_dieta_cabecera as $row_dieta_cabecera){echo $row_dieta_cabecera['id_dieta'];}?></label>
            Nombre de la dieta:
            <label class="w3-panel w3-border" id="nombre_dieta" contenteditable="true"><?php foreach($datos_dieta_cabecera as $row_dieta_cabecera){echo $row_dieta_cabecera['nombre'];}?></label>
            <label id="validacion_nombre" class="w3-text-red"></label>
        </div>
    </div>
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
                    echo "<td><label id='".$columna.";".$fila['categoria_id']."' contenteditable='true'>";
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