<script type="text/javascript" src="<?php echo base_url() ?>js/Admin/usuarios.js"></script>
<div class="large-12 columns">
    <div class="row">
    	<div class="large-12 columns">
            <a href="<?=base_url()?>index.php/admin/newEditUsuario" class="button tiny" id="nuevo">Usuario Nuevo</a>
            <input class="button tiny" type="button" id="editar" value="editar">
            <input class="button tiny" type="button" id="eliminar" value="eliminar">
             <table id="table_id" class="compact hover row-border">
                <thead>
                    <tr>
                    	<th>id</th>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nacimiento</th>
                        <th>Comuna ID</th>
                        <th>Comuna</th>
                        <th>Direccion</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Telefono</th>
                        <th>Tipo id</th>
                        <th>Permiso</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div id="myModal" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <h2 id="tituloModal"></h2>
    <p id="mensajeModal"></p>
    <a class="close-reveal-modal" aria-label="Close" id="closeModal">&#215;</a>
</div>