<script type="text/javascript" src="<?php echo base_url() ?>js/Admin/producto.js"></script>
    <div id="dialog" title="">
    <form id="formCampos">
    <P>
    <LABEL >Id sub categoria: </LABEL>
     <SELECT NAME="ID_SUBCATE" id="ID_SUBCATE">
                   <option>Seleccione una Opción...</option>
                <?php 
				foreach($sub_categoria as $row)
						{?>
						    <OPTION VALUE="<?=$row->sub_cate_id;?>"><?=$row->sub_cate_descr;?></OPTION>;
				<?php 	}?>
 
					
                        </SELECT>
            
    <LABEL>id alimento: </LABEL>
              <INPUT type="text" id="ID_ALIMENTO" name="ID_ALIMENTO"><BR>
    <LABEL >Alimento: </LABEL>
              <INPUT type="text" id="ALIMENTO" name="ALIMENTO"><BR>
    <LABEL>cantidad en gramos: </LABEL>
              <INPUT type="text" id="Cantidad_gramos" name="Cantidad_gramos"><BR>
    <LABEL >Humedad: </LABEL>
              <INPUT type="text" id="Humedad" name="Humedad"><BR>
    <LABEL>Calorias: </LABEL>
              <INPUT type="text" id="Calorias" name="Calorias"><BR>
    <LABEL >Proteinas G: </LABEL>
              <INPUT type="text" id="Proteinas_g" name="Proteinas_g"><BR>
    <LABEL>Carbohidratos G: </LABEL>
              <INPUT type="text" id="Hidratos_g" name="Hidratos_g"><BR>
    <LABEL >Fibra detaria G: </LABEL>
              <INPUT type="text" id="Fibra_Dietaria_g" name="Fibra_Dietaria_g" ><BR>
    <LABEL>Lipidos G: </LABEL>
              <INPUT type="text" id="Lipidos_g" name="Lipidos_g"><BR>
    <LABEL >Saturados G: </LABEL>
              <INPUT type="text" id="Saturados_g" name="Saturados_g"><BR>
    <LABEL>Monosaturados G: </LABEL>
              <INPUT type="text" id="Monoinsat_g" name="Monoinsat_g"><BR>
    <LABEL >Polisatirados G: </LABEL>
              <INPUT type="text" id="Polieinsat_g" name="Polieinsat_g"><BR>
    <LABEL>Colesterol Mg: </LABEL>
              <INPUT type="text" id="Colesterol_mg" name="Colesterol_mg"><BR>
    <LABEL >OMEGA 6 G: </LABEL>
              <INPUT type="text" id="omega_6_g" name="omega_6_g"><BR>
    <LABEL>OMEGA 3 G: </LABEL>
              <INPUT type="text" id="omega_3_g" name ="omega_3_g"><BR>
    <LABEL >Caroteno ER: </LABEL>
              <INPUT type="text" id="Caroteno_ER" name ="Caroteno_ER"><BR>
    <LABEL>Retinol ER: </LABEL>
              <INPUT type="text" id="Retinol_ER" name="Retinol_ER"><BR>
    <LABEL >Vitamina AER: </LABEL>
              <INPUT type="text" id="Vitamina_AER" name="Vitamina_AER"><BR>
    <LABEL>Vitamina B1 mg: </LABEL>
              <INPUT type="text" id="Vit_B1_mg" name="Vit_B1_mg"><BR>
    <LABEL >Vitamina B2 mg: </LABEL>
              <INPUT type="text" id="Vit_B2_mg" name ="Vit_B2_mg"><BR>
    <LABEL>Niacina mg: </LABEL>
              <INPUT type="text" id="Niacina_mg" name ="Niacina_mg"><BR>
    <LABEL >Vitamina B6 mg: </LABEL>
              <INPUT type="text" id="Vit_B6_mg" name ="Vit_B6_mg"><BR>
    <LABEL>Vitamina B12 mg: </LABEL>
              <INPUT type="text" id="Vit_B12_mg" name="Vit_B12_mg"><BR>
    <LABEL >Folatos mcg: </LABEL>
              <INPUT type="text" id="Folatos_mcg" name ="Folatos_mcg"><BR>
    <LABEL>Pantotenico mg: </LABEL>
              <INPUT type="text" id="Pantotenico_mg" name="Pantotenico_mg"><BR>
    <LABEL >Vitamina C mg: </LABEL>
              <INPUT type="text" id="Vit_C_mg" name="Vit_C_mg"><BR>
    <LABEL>Vitamina E mg: </LABEL>
              <INPUT type="text" id="Vit_E_mg" name="Vit_E_mg"><BR>
    <LABEL >Calcio mg: </LABEL>
              <INPUT type="text" id="Calcio_mg" name="Calcio_mg"><BR>
    <LABEL>Cobre mg: </LABEL>
              <INPUT type="text" id="Cobre_mg" name="Cobre_mg" ><BR>
    <LABEL >Hierro mg: </LABEL>
              <INPUT type="text" id="Hierro_mg" name="Hierro_mg"><BR>
    <LABEL>Magnesio mg: </LABEL>
              <INPUT type="text" id="Magnesio_mg" name="Magnesio_mg"><BR>
    <LABEL >Fosforo mg: </LABEL>
              <INPUT type="text" id="Fosforo_mg" name="Fosforo_mg"><BR>
    <LABEL>Potasio mg: </LABEL>
              <INPUT type="text" id="Potasio_mg" name="Potasio_mg"><BR>
    <LABEL >Selenio mcg: </LABEL>
              <INPUT type="text" id="Selenio_mcg" name="Selenio_mcg"><BR>
    <LABEL>Sodio mg: </LABEL>
              <INPUT type="text" id="Sodio_mg" name="Sodio_mg"><BR>
    <LABEL>Zinc mg: </LABEL>
              <INPUT type="text" id="Zinc_mg" name="Zinc_mg"><BR>
   
    <input id="add" type="button" value = "Guardar">  <input id="feditar" type="button" value = "Editar">
     <div id="mens"></div>

    </P>
 <!-- </FORM>-->
 </form>
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
                <th>ID_SUBCATE</th>
                <th>ID_ALIMENTO</th>
                <th>ALIMENTO</th>
                <th>Cantidad_gramos</th>
                <th>Humedad</th>
                <th>Calorias</th>
                <th>Proteinas_g</th>
                <th>Hidratos_g</th>
                <th>Fibra_Dietaria_g</th>
                <th>Lipidos_g</th>
                <th>Saturados_g</th>
                <th>Monoinsat_g</th>
                <th>Polieinsat_g</th>
                <th>Colesterol_mg</th>
                <th>omega_6_g</th>
                <th>omega_3_g</th>
                <th>Caroteno_ER</th>
                <th>Retinol_ER</th>
                <th>Vitamina_AER</th>
                <th>Vit_B1_mg</th>
                <th>Vit_B2_mg</th>
                <th>Niacina_mg</th>
                <th>Vit_B6_mg</th>
                <th>Vit_B12_mg</th>
                <th>Folatos_mcg</th>
                <th>Pantotenico_mg</th>
                <th>Vit_C_mg</th>
                <th>Vit_E_mg</th>
                <th>Calcio_mg</th>
                <th>Cobre_mg</th>
                <th>Hierro_mg</th>
                <th>Magnesio_mg</th>
                <th>Fosforo_mg</th>
                <th>Potasio_mg</th>
                <th>Selenio_mcg</th>
                <th>Sodio_mg</th>
                <th>Zinc_mg</th>
            </tr>
        </thead>
        <tbody>
        </tbody>  
	</table>
        </div>
    </div>
</div>