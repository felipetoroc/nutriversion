<script type="text/javascript" src="<?php echo base_url() ?>js/Admin/usuarios.js"></script>
<div id="result">
</div>
<div class="row" id="formulario" >
    <div class="large-12 columns">
    	<form id="formCampos">
            <input type="hidden" name="id" id="id">
            <label>Nombre:</label>
            <input type="text" name="nombre" id="nombre">
            <label>Apellido:</label>
            <input type="text" name="apellido" id="apellido">
            <label>Fecha De Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
            <label>Comuna:</label><img src="<?php echo base_url() ?>img/edit.png" width="10px" height="10px" id="btnMostrarComuna"><br>
            <div id="comboscomuna">
                <select name="region" id="region">
                <option value="0">Seleccione...</option>
                <?php foreach ($regiones as $row){ ?>
                    <option value="<?=$row->REGION_ID;?>"><?=$row->REGION_NOMBRE;?></option>
                <?php } ?>
                </select>
                <select name="provincia" id="provincia"></select>
                <select id="cbcomuna"></select>
            </div>
            <input type="hidden" name="comuna" id="comuna">
            <input type="text" id="comunanombre" disabled>
            <label>Direccion:</label>
            <input type="text" name="direccion" id="direccion">
            <label>Usuario:</label>
            <input type="text" name="usuario" id="usuario">
            <label>Contraseña:</label>
            <input type="password" name="pass" id="pass">
            <label>Email:</label>
            <input type="email" name="email" id="email">
            <label>Celular:</label>
            <input type="text" name="celular" id="celular">
            <label>Telefono:</label>
            <input type="text" name="telefono" id="telefono">
            <label>Tipo:</label>
            <select name="tipo" id="tipo">
            <option value="admin">Administrador</option>
            <option value="pro">Profesional</option>
            <option value="common">Comun</option>
            </select>
            <input class="small button" type="button" id="guardar" value="Guardar">
            <input class="small button" type="button" id="insertar" value="Insertar">
        </form>
    </div>
</div>
<div class="large-10 columns">
    <div class="row">
    	<div class="large-12 columns">
            <input class="button tiny" type="button" id="nuevo" value="nuevo">
            <input class="button tiny" type="button" id="editar" value="editar">
            <input class="button tiny" type="button" id="eliminar" value="eliminar">
             <table id="table_id" class="compact hover row-border">
                <thead>
                    <tr>
                    	<th>id</th>
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
                        <th>Tipo</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>