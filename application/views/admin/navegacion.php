<li><a href="<?php echo base_url() ?>index.php/clientepro"> Inicio</a></li>
<li><a href='<?php echo base_url() ?>index.php/clientepro/dietas'>Dietas</a></li>
<li><a href='<?php echo base_url() ?>index.php/clientepro/clientes'>Pacientes</a></li>
<li><a href='<?php echo base_url() ?>index.php/clientepro/ReporteEstadoFisico'>Reportes</a></li>
<?php
	if($this->session->userdata("tipo_usuario") == 3){
	?>
		<li><a href='<?php echo base_url() ?>index.php/admin/usuarios'>Usuarios</a></li>
	<?php
	}
?>