<script type="text/javascript" src="<?php echo base_url() ?>js/Admin/sub_categoria.js"></script>
     <div id="dialog" title="">
   
    <P>
    <LABEL >id sub categoria: </LABEL>
              <INPUT type="text" id="sub_cate_id" NAME="sub_cate_id"><BR>
    <LABEL>descripcion sub categiria: </LABEL>
              <INPUT type="text" id="sub_cate_descr" NAME="sub_cate_descr"><BR>
              <SELECT NAME="categoria_id" id="categoria_id">
                   <option>Seleccione una Opción...</option>
                <?php 
				foreach($categoria as $row)
						{?>
						    <OPTION VALUE="<?=$row->categoria_id;?>"><?=$row->categoria_descr;?></OPTION>;
				<?php 	}?>
 
					
                        </SELECT>
   
    <input id="add" type="button" value = "Guardar">  <input id="feditar" type="button" value = "Editar">
     <div id="mens"></div>

    </P>

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
                <th>sub_cate_id</th>
                <th>sub_cate_descr</th>
                 <th>categoria_id</th>
            </tr>
        </thead>
        <tbody>
        </tbody>  
	</table>
        </div>
    </div>
</div>