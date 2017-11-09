<script type="text/javascript" src="<?php echo base_url() ?>js/clientepro/tablaClientes.js"></script>
<div class="large-12 medium-12 small-12 columns">
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <table id="tabla" class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div id="div_detalles_cliente" class="large-6 medium-6 small-12 columns">
            <h3>Estado Fisico</h3>
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
        <div id="div_detalles_cliente" class="large-6 medium-6 small-12 columns">
            <h3>Dieta Asignada</h3>
            <h4 id="resultBusquedaDieta"></h4>
            <table id="tablaDieta" class="table">

            </table>
        </div>
    </div>
</div>