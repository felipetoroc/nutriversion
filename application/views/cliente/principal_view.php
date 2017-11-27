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
        <div class="small-12 medium-9 large-9 columns">
            <div class="row">
                <div class="small-12 medium-12 large-12 columns">
                    <h3>Datos de la cuenta:</h3>
                    <a href="<?=base_url()?>index.php/cliente/datosUsuario">Actualizar Datos</a>
                </div>
            </div>
            <div class="row">
                <div class="small-12 medium-6 large-6 columns">
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
                            <td>Nacimiento</td><td><?php echo date("d-m-Y",strtotime($this->session->userdata("fechaNac"))) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="small-12 medium-6 large-6 columns">
                    <table class="tabla">
                        <tr>
                            <td>Región</td><td><?=$this->session->userdata("region_nombre")?></td>
                        </tr>
                        <tr>
                            <td>Provincia</td><td><?=$this->session->userdata("provincia_nombre")?></td>
                        </tr>
                        <tr>
                            <td>Comuna</td><td><?=$this->session->userdata("comuna_nombre")?></td>
                        </tr>
                        <tr>
                            <td>Dirección</td><td><?=$this->session->userdata("direccion")?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>