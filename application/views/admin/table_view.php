
    
    <script>
    
		$(document).ready(function() {			   
			$('#example').dataTable( {				
				"ajax": "<?php echo base_url() ?>index.php/dietas/dieta_data",					
					 "columns": [
					    { "data": "ID_SUBCATE" },
						{ "data": "ID_ALIMENTO" },
						{ "data": "ALIMENTO" },
						{ "data": "Cantidad_gramos" },
						{ "data": "Humedad" },
						{ "data": "Calorias" },
						{ "data": "Proteinas_g" },
						{ "data": "Hidratos_g" },
						{ "data": "Fibra_Dietaria_g" },
						{ "data": "Lipidos_g" },
						{ "data": "Saturados_g" },
						{ "data": "Monoinsat_g" },
						{ "data": "Polieinsat_g" },
						{ "data": "Colesterol_mg" },
						{ "data": "omega_6_g" },
						{ "data": "omega_3_g" },
						{ "data": "Caroteno_ER" },
						{ "data": "Retinol_ER" },
						{ "data": "Vitamina_AER" },
						{ "data": "Vit_B1_mg" },
						{ "data": "Vit_B2_mg" },
						{ "data": "Niacina_mg" },
						{ "data": "Vit_B6_mg" },
						{ "data": "Vit_B12_mg" },
						{ "data": "Folatos_mcg" },
						{ "data": "Pantotenico_mg" },
						{ "data": "Vit_C_mg" },
						{ "data": "Vit_E_mg" },
						{ "data": "Calcio_mg" },
						{ "data": "Cobre_mg" },
						{ "data": "Hierro_mg" },
						{ "data": "Magnesio_mg" },
						{ "data": "Fosforo_mg" },
						{ "data": "Potasio_mg" },
						{ "data": "Selenio_mcg" },
						{ "data": "Sodio_mg" },
						{ "data": "Zinc_mg" }
						]
					
			    });
			});

	</script>
    
    

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