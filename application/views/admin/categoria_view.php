<script type="text/javascript" src="<?php echo base_url() ?>js/Admin/categoria.js"></script>
    <div id="dialog" title="">
    <!-- <FORM  action="" method="post"> -->
    <P>
    <LABEL >id categoria: </LABEL>
              <INPUT type="text" id="id_categoria"><BR>
    <LABEL>Descripcion categoria: </LABEL>
              <INPUT type="text" id="descr_cate"><BR>
   
    <input id="add" type="button" value = "Guardar">  <input id="feditar" type="button" value = "Editar">
     <div id="mens"></div>

    </P>
 <!-- </FORM>-->
 </div>
 
 
 <button id="opener">Insertar Datos</button>
 <input class="button" type="button" id="eliminar" value="eliminar">
 <input class="button" type="button" id="editar" value="Editar"><br>
    
    <div class="large-9 medium-9 columns">
    <div class="row">
    	<div class="large-12 columns">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>categoria_id</th>
                <th>categoria_descr</th>
            </tr>
        </thead>
        <tbody>
        </tbody>  
	</table>
        </div>
    </div>
</div>








