<div class="large-6 large-centered columns">
    <div class="panel">
        <div>
        	<p style="color:red">
        	<?php
    			echo $this->session->flashdata('error');
    		?>
            </p>
            <!-- Inicio formulario de login -->
            <p class="text-center">Ingreso Usuario</p>
            <form method="post" action="<?php echo base_url() ?>index.php/Login/iniciar">
                <label>Rut (sin puntos ni guión)</label>
                <input type="text" name="rut">
                <label>Contraseña</label>
                <input type="password" name="pw">
                <input type="submit" class="button radius" value="Iniciar Sesión">
            </form>
            <p>¿No es usuario? <a href="<?=base_url()?>index.php/registro">Registrarme.</a></p>
        </div>
    </div>
</div>