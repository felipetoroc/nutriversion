<div class="large-6 large-centered columns">
<div class="panel">
<ul class="example-orbit-content" data-orbit data-options="bullets: false;timer: false;navigation_arrows: false;next_on_click:false;pause_on_hover:false;slide_number: false">
    <li data-orbit-slide="headline-1">
        <div>
            <a class="button warning" href="<?=base_url()?>index.php/login/cerrar">Cerrar Sesión</a>
        	<p style="color:red">
        	<?php
				echo $this->session->flashdata('error');
			?>
            </p>
            <!-- Inicio formulario de login -->
            <p class="text-center">Ingreso Usuario</p>
            <form method="post" action="<?php echo base_url() ?>index.php/Login/actualizar_pass" id="changepassword">
                <label>Contraseña Nueva (mínimo 6 caracteres)</label><span style="font-weight: bolder" id="passstrength"></span>
                <input type="password" name="pass1" id="pass1" minlength="6" required>
                <label>Reingrese Contraseña</label><span id="passequalto"></span>
                <input type="password" name="pass2" id="pass2" required>
                <input type="submit" class="button radius" value="Guardar">
            </form>
        </div>
    </li>
</ul>
</div>
</div>
<script>
$('#pass1').keyup(function(e) {
     var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
     var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
     var enoughRegex = new RegExp("(?=.{6,}).*", "g");
     if (false == enoughRegex.test($(this).val())) {
             $('#passstrength').html('Más caracteres.').css("color","red");
     } else if (strongRegex.test($(this).val())) {
             $('#passstrength').className = 'ok';
             $('#passstrength').html('Fuerte!').css("color","green");
     } else if (mediumRegex.test($(this).val())) {
             $('#passstrength').className = 'alert';
             $('#passstrength').html('Media!').css("color","yellow");
     } else {
             $('#passstrength').className = 'error';
             $('#passstrength').html('Débil!').css("color","red");
     }
     return true;
});
$("#changepassword").validate({
    rules: {
                pass1: {
                    noSpace: true
                },
                pass2:{
                    noSpace: true,
                    equalTo: "#pass1"
                }
            }
});
</script>