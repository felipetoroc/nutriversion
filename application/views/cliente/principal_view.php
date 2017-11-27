<script>
function ocultarImagen(){
    document.getElementById('cargarImagen').style.display = 'none';
}
function subirImagen(){
    document.getElementById('cargarImagen').style.display = 'block';
}
</script>
<div class="large-9 medium-9 columns">
    <div class="row">
        <div class="small-12 medium-3 large-3 columns">
            <div class="row">
                <div class="small-12 large-12 columns">
                    <img src="<?=base_url().$this->session->userdata('imagen_url')?>">
                </div>
            </div>
            <div class="row">
                <div class="small-12 large-12 columns">
        	       <input type="button" Value="Subir Imagen" name="mostrar" id="mostrar" class="button postfix" onclick="subirImagen()">
                </div>
                <div id="cargarImagen" class="small-12 large-12 columns" style="display: none">
        			<form action="<?=base_url()?>index.php/cliente/actualizarUrlC" method="POST" enctype = "multipart/form-data">
                        <input type=file name="url_imagen" id="url_imagen" value="mas" accept="image/*">
                        <input type="submit" Value="CARGAR" name="ok" id="ok" class="button postfix" onclick="ocultarImagen()">	
                    </form>
                </div>  
            </div>
        </div>
            <h3>Datos de la cuenta:</h3>
            <a href="<?=base_url()?>index.php/cliente/datosUsuario">Actualizar Datos</a>
        <div class="small-12 medium-5 large-5 columns">
            <table class="tabla">
				<tr>
                    <td>Rut</td><td><?=$this->session->userdata("rut")?></td>
                </tr>
                <tr>
                    <td>Nombre</td><td><?=$this->session->userdata("nombre")." ".$this->session->userdata("apellido")?></td>
                </tr>
                <tr>
                    <td>Email</td><td><?=$this->session->userdata("email")?></td>
                </tr>
                <tr>
                    <td>Nacimiento</td><td><?=$this->session->userdata("fechaNac")?></td>
                </tr>
            </table>
        </div>
        <div class="small-12 medium-4 large-4 columns">
            <table class="tabla">
                <tr>
                    <td>Comuna</td><td><?=$this->session->userdata("comuna_id")?></td>
                </tr>
                <tr>
                    <td>Dirección</td><td><?=$this->session->userdata("direccion")?></td>
                </tr>
            </table>
        </div>
    </div>
</div>