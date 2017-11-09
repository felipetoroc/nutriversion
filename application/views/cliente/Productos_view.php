<div class="large-9 medium-9 columns">
    <div class="row">
    	<div class="large-6 medium-6 columns">
             <h1>Mostrar Productos </h1>
            <table>
              <tr>
                    <td>Alimento</td>
                
                    <td>Medida</td>
               
                    <td>Equivalencia</td>
                
                    <td>Calorias</td>
                </tr>
            	<?php
			 	foreach ($producto->result() as $row) {
   
			 	?>
                <tr>
                    <td><?=$row->alimento;?></td>
                
                    <td><?=$row->medida;?></td>
               
                    <td><?=$row->equivalencia;?></td>
                
                    <td><?=$row->calorias;?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="large-6 medium-6 columns">
             <img src="<?=base_url().$this->session->userdata('imagen_url')?>" width="400px" height="400px">
        </div>
    </div>
    <div class="row">
        <div class="large-6 medium-6 columns">
            
        </div>
        <div class="large-6 medium-6 columns">
            
        </div>
    </div>
</div>
