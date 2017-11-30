<script type="text/javascript" src="<?php echo base_url() ?>js/clientepro/tablaClientes.js"></script>
<div class="large-12 medium-12 small-12 columns">
    <div class="large-3 medium-4 small-12 columns">
        <table id="tabla" class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="large-9 medium-8 small-12 columns">
        <div class="row">
            <div class="large-10 medium-12 small-12 columns">
                <h3>Datos Paciente Seleccionado</h3>
            </div>
        </div>
        <div class="row panel">
            <div id="div_detalles_cliente" class="large-5 medium-12 small-12 columns">
                <input type="hidden" id="id_cliente" value="" readonly>
                <input type="hidden" id="nombre_cliente" value="" readonly>
                <input type="hidden" id="apellido_cliente" value="" readonly>
                <h4>Estado Físico</h4>
                <button id="btnActualizarEstado" class="btn-sm">Ingresar o Actualizar Estado Físico</button>
                <table class="table">
                    <tr>
                        <td>Nivel de actividad fisica</td><td><label id="niv_actividad"></label></td>
                    </tr>
                    <tr>
                        <td>Altura</td><td><label id="altura"></label></td>
                    </tr>
                    <tr>
                        <td>Peso</td><td><label id="peso"></label></td>
                    </tr>
                    <tr>
                        <td>IMC</td><td><label id="imc"></label></td>
                    </tr>
                    <tr>
                        <td>% de grasa corporal</td><td><label id="gr_corporal"></label></td>
                    </tr>
                    <tr>
                        <td>Consumo Calorico Diario</td><td><label id="cons_cal_diario"></label></td>
                    </tr>
                </table>
            </div>
            <div id="div_detalles_cliente" class="large-5 medium-12 small-12 columns">
                <h3>Dieta Asignada</h3>
                <button id="btnAsignarDieta" class="btn-sm">Asignar Dieta</button>
                <h4 id="resultBusquedaDieta"></h4>
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
                            echo "<td><label class='porciones' id='".$columna."-".$fila['categoria_id']."' >";

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
</div>
<div id="myModal" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <h2 id="modalTitle">Advertencia!</h2>
    <p id="textModal"></p>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>