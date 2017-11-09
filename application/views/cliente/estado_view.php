<div class="row">
<div class="large-9 medium-9 columns">
    <div class="row">
    	<div class="large-6 medium-6 columns">
             <p>Datos d</p>
            <table>
                <tr>
                    <td>Nombre</td><td><?=$this->session->userdata("nombre")." ".$this->session->userdata("apellido")?></td>
                </tr>
                <?php foreach ($estado_fisico as $row){ ?>
                <tr>
                    <td>Edad</td><td><?=$row->edad?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="large-6 medium-6 columns">
             <img src="<?=base_url().$this->session->userdata('imagen_url')?>">
        </div>
    </div>
</div>
</div>