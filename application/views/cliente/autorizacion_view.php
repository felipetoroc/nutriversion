<div class="large-4 medium-9 small-12 columns">
    <div class="panel">
            <p style="color:red">
            <?php
                echo $this->session->flashdata('error');
            ?>
            </p>
            <!-- Inicio formulario de login -->
            <h3 class="text-center">Autorización de Profesional</h3>
            <form class="log-in-form" method="post" action="<?php echo base_url() ?>index.php/cliente/verificarProfesional">
                <label>Rut</label>
                <input type="text" name="rut">
                <label>Contraseña</label>
                <input type="password" name="pw">
                <input type="submit" class="button expanded" value="Verificar">
            </form>
    </div>
</div>
