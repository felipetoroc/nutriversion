<li><a href="<?php echo base_url() ?>index.php/clientepro"> Inicio</a></li>
<li><a href='<?php echo base_url() ?>index.php/clientepro/dietas'>Dietas</a></li>
<li><a href='<?php echo base_url() ?>index.php/clientepro/clientes'>Pacientes</a></li>
<li class="has-dropdown">
	<a href='#'>Reportes</a>
	<ul class="dropdown">
        <li><a href='<?php echo base_url() ?>index.php/clientepro/ReporteEstadoFisico'>Estado Físico</a></li>
        <li><a href='<?php echo base_url() ?>index.php/clientepro/ReporteAlimentos'>Alimentos</a></li>
    </ul>
</li>
<?php
	if($this->session->userdata("tipo_usuario") == 3){
	?>
		<li><a href='<?php echo base_url() ?>index.php/admin/usuarios'>Usuarios</a></li>
	<?php
	}
?>