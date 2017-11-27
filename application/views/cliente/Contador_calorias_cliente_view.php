<script type="text/javascript" src="<?php echo base_url() ?>js/cliente/ver_contador.js"></script>
<div class="large-9 medium-9 columns">
    <div class="row">
    	<div class="large-12 columns">
        <input id="fecha_detalle" type="date" name="bday" style="width:300px" >
        <h5 style="color:green" id="sum_cal">Calorias Consumidas Hoy:</h5>
        <h5 style="color:grey"><?=$calorias_cal?></h5>
        </div>
</div>
</div>
 <input class="button" type="button" id="delete" value="Eliminar Alimento"><br>
    
    <div class="large-9 medium-9 columns">
    <div class="row">
    	<div class="large-12 columns">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                 <th>id_detalle</th>
                 <th>cliente</th>
                 <th>fecha</th>
                 <th>comida</th>
                 <th>alimento</th>
                 <th>cantidad</th>
                 <th>Calorias</th>
            </tr>
        </thead>
        <tbody>
        </tbody>  
	</table>
    	<div id="footerCallback"></div>
        </div>
    </div>
</div>
<div id="myModal" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <h2 id="modalTitle">Advertencia!</h2>
    <p id="mensajeError"></p>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>