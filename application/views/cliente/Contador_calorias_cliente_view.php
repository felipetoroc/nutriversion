<script type="text/javascript" src="<?php echo base_url() ?>js/cliente/ver_contador.js"></script>
<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        <div class="row">
        	<div class="large-6 medium-6 columns">
                <div class="large-6 columns">
                    <p">Ver alimentos consumidos el:</p>
                </div>
                <div class="large-6 columns">
                    <input id="fecha_detalle" type="date" name="bday" >
                </div>
            </div>
            <div class="large-6 medium-6 columns">
                <h3 style="color:green" id="sum_cal">Calorias Consumidas Hoy: <?=$calorias_cal?></h3>
            </div>
        </div>
        <div class="row">
            <div class="large-12 medium-12 columns">
                <table id="example" class="display">
                    <thead>
                        <tr>
                             <th>id_detalle</th>
                             <th>Cliente</th>
                             <th>Fecha</th>
                             <th>Comida</th>
                             <th>Alimento</th>
                             <th>Porción</th>
                             <th>Calorias</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>  
            	</table>
            	<div id="footerCallback"></div>
            </div>
        </div>
        <div class="row">
            <div class="large-12 medium-12 columns">
                <input class="button right" type="button" id="delete" value="Eliminar Alimento">
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <h2 id="modalTitle">Advertencia!</h2>
    <p id="mensajeError"></p>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>