<script>
function ocultarImagen()
{
    document.getElementById('cargarImagen').style.display = 'none';
}
function subirImagen()
{
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
        	       <input type="button" Value="CARGAR NUEVA IMAGEN" name="mostrar" id="mostrar" class="button postfix" onclick="subirImagen()">
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
            <p>Datos de la cuenta:</p>
            <table>
				<tr>
                    <td>ID</td><td><?=$this->session->userdata("id")?></td>
                </tr>
                <tr>
                    <td>Nombre</td><td><?=$this->session->userdata("nombre")." ".$this->session->userdata("apellido")?></td>
                </tr>
                <tr>
                    <td>Email</td><td><?=$this->session->userdata("email")?></td>
                </tr>
            </table>
        </div>
    </div>
</div>