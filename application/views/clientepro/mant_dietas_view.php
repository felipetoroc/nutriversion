<script type="text/javascript" src="<?php echo base_url() ?>js/clientepro/dietas.js"></script>
<div class="large-12 columns">
    <form id="formEnvEditar" style="display:inline" action="<?=base_url()?>index.php/clientepro/editordietas" method="post">
    	<input type="hidden" name="id_dieta" id="id_dieta">
        <input type="hidden" name="nombre_dieta" id="nombre_dieta">
   	    <input class="button tiny" name="editar" type="submit" id="editar" value="editar">
    </form>
    <input class="button tiny" type="button" name="nuevo" id="nuevo" value="nuevo">
    <input class="button tiny alert" type="button" name="eliminar" id="eliminar" value="eliminar">
    <input type="hidden" name="id_cliente" id="id_cliente" value="<?=$this->session->flashdata('id_cliente')?>">
    <?php
    if ($this->session->flashdata('id_cliente')){
    ?>
    <input class="button tiny" type="button" name="asignardieta" id="btnAsignarDietaA" value="Asignar Dieta a <?=strtoupper($this->session->flashdata('nombre_cliente')." ".$this->session->flashdata('apellido_cliente'))?>">
    <?php } ?>
    <table id="table_dietas" class="table">
        <thead>
            <tr>
            	<th>id</th>
                <th>Nombre</th>
                <th>Fecha Creacion</th>
                <th>Fecha Modificacion</th>
                <th>Estado</th>
                <th>Creado Por</th>
            </tr>
        </thead>
    </table>
</div>
<div id="selecionarDieta" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <h2 id="modalTitle">Advertencia!</h2>
    <p>Debe seleccionar una dieta de la lista.</p>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="dietaEliminada" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <h2 id="modalTitle">Advertencia!</h2>
    <p>la dieta fue eliminada</p>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="dietaCreada" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <h2 id="modalTitle">Advertencia!</h2>
    <p>Dieta creada disponible para su edición</p>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="myModal2" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <h2 id="modalTitle">Advertencia!</h2>
    <p>Favor selecione un paciente.</p>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>