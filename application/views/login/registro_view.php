<div class="large-6 large-centered columns">
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
            <p class="text-center">Registro Nuevo Usuario</p>
            <form method="post" action="<?=base_url()?>index.php/Registro/registrar">
            	<label>Nombre</label>
                <input type="text" name="nombre">
                <label>Apellidos</label>
                <input type="text" name="apellidos">
                <label>Email</label>
                <input type="text" name="mail">
                <label>Sexo</label>
                <INPUT type="radio" name="sexo" value="1"> Hombre
                <INPUT type="radio" name="sexo" value="2"> Mujer
                <LABEL>Objetivo: </LABEL> 
                 <select name="objetivo">
                    <option>Seleccione objetivo...</option>
                    
                        <OPTION VALUE="1">Bajar de peso</OPTION>
                        <OPTION VALUE="2">Mantener Peso</OPTION>
                        <OPTION VALUE="3">subir de peso</OPTION>
                    </select>
                <label>Usuario</label>
                <input type="text" name="usuario">
                <label>Contraseña</label>
                <input type="password" name="pw">
                <label>Repita Contraseña</label>
                <input type="password" name="pw2">
                <input type="submit" class="button radius" value="Registrarme">
            </form>
        </div>
    </li>
</ul>
</div>
</div>