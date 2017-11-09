<script type="text/javascript" src="<?php echo base_url() ?>js/clientepro/dietas.js"></script>
<div class="large-12 columns">
    <form style="display:inline" action="<?=base_url()?>index.php/clientepro/editordietas" method="post">
    	<input type="hidden" name="id_dieta" id="id_dieta">
        <input type="hidden" name="nombre_dieta" id="nombre_dieta">
   	    <input class="button tiny" name="editar" type="submit" id="editar" value="editar">
    </form>
    <input class="button tiny" type="button" name="nuevo" id="nuevo" value="nuevo">
    <input class="button tiny" type="button" name="eliminar" id="eliminar" value="eliminar">
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