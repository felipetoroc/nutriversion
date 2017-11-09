<div class="large-3 large-centered columns">
<div class="panel">
<ul class="example-orbit-content" data-orbit data-options="bullets: false;timer: false;navigation_arrows: false;next_on_click:false;pause_on_hover:false;slide_number: false">
    <li data-orbit-slide="headline-1">
        <div>
        	<p style="color:red">
        	<?php
				echo $this->session->flashdata('error');
			?>
            </p>
            <!-- Inicio formulario de login -->
            <p class="text-center">Ingreso Usuario</p>
            <form method="post" action="<?php echo base_url() ?>index.php/Loginadmin/recuperar">
                <label>Usuario</label>
                <input type="text" name="mail">
                <input type="submit" class="button radius" value="Recuperar Contraseña">
            </form>
        </div>
    </li>
</ul>
</div>
</div>
