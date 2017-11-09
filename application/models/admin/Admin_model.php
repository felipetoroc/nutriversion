<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function insertar_categoria()
	{

		$id = $this->input->post('id_categoria');
		$descr = $this->input->post('descr_cate');

		 return  $this->db->query("insert into categoria values(".$id.",'".$descr."')");
      
	  
    }
	
	function leer_alimentos()
	{
		$query = $this->db->query("SELECT ID_SUBCATE,
										 ID_ALIMENTO,
										 ALIMENTO,
										 Cantidad_gramos,
										 Humedad, Calorias,
										 Proteinas_g,
										 Hidratos_g, 
										 Fibra_Dietaria_g,
										 Lipidos_g,
										 Saturados_g,
										 Monoinsat_g,
										 Polieinsat_g,
										 Colesterol_mg,
										 omega_6_g,
										 omega_3_g,
										 Caroteno_ER,
										 Retinol_ER,
										 Vitamina_AER,
										 Vit_B1_mg,
										 Vit_B2_mg,
										 Niacina_mg,
										 Vit_B6_mg,
										 Vit_B12_mg,
										 Folatos_mcg,
										 Pantotenico_mg,
										 Vit_C_mg,
										 Vit_E_mg,
										 Calcio_mg,
										 Cobre_mg,
										 Hierro_mg,
										 Magnesio_mg,
										 Fosforo_mg,
										 Potasio_mg,
										 Selenio_mcg,
										 Sodio_mg,
										 Zinc_mg
										 FROM alimentos");
		
		//$lala = array("data",$query);
		//return json_encode($query->result());
		
			             //$i=0;
						$tabla = "";
						
						foreach($query->result_array() as $row )
						{
							$tabla.='{"ID_SUBCATE":"'.$row['ID_SUBCATE'].'",
							"ID_ALIMENTO":"'.$row['ID_ALIMENTO'].'",
							"ALIMENTO":"'.$row['ALIMENTO'].'",
							"Cantidad_gramos":"'.$row['Cantidad_gramos'].'",
							"Humedad":"'.$row['Humedad'].'",
							"Calorias":"'.$row['Calorias'].'",
							"Proteinas_g":"'.$row['Proteinas_g'].'",
							"Hidratos_g":"'.$row['Hidratos_g'].'",
							"Fibra_Dietaria_g":"'.$row['Fibra_Dietaria_g'].'",
							"Lipidos_g":"'.$row['Lipidos_g'].'",
							"Saturados_g":"'.$row['Saturados_g'].'",
							"Monoinsat_g":"'.$row['Monoinsat_g'].'",
							"Polieinsat_g":"'.$row['Polieinsat_g'].'",
							"Colesterol_mg":"'.$row['Colesterol_mg'].'",
							"omega_6_g":"'.$row['omega_6_g'].'",
							"omega_3_g":"'.$row['omega_3_g'].'",
							"Caroteno_ER":"'.$row['Caroteno_ER'].'",
							"Retinol_ER":"'.$row['Retinol_ER'].'",
							"Vitamina_AER":"'.$row['Vitamina_AER'].'",
							"Vit_B1_mg":"'.$row['Vit_B1_mg'].'",
							"Vit_B2_mg":"'.$row['Vit_B2_mg'].'",
							"Niacina_mg":"'.$row['Niacina_mg'].'",
							"Vit_B6_mg":"'.$row['Vit_B6_mg'].'",
							"Vit_B12_mg":"'.$row['Vit_B12_mg'].'",
							"Folatos_mcg":"'.$row['Folatos_mcg'].'",
							"Pantotenico_mg":"'.$row['Pantotenico_mg'].'",
							"Vit_C_mg":"'.$row['Vit_C_mg'].'",
							"Vit_E_mg":"'.$row['Vit_E_mg'].'",
							"Calcio_mg":"'.$row['Calcio_mg'].'",
							"Cobre_mg":"'.$row['Cobre_mg'].'",
							"Hierro_mg":"'.$row['Hierro_mg'].'",
							"Magnesio_mg":"'.$row['Magnesio_mg'].'",
							"Fosforo_mg":"'.$row['Fosforo_mg'].'",
							"Potasio_mg":"'.$row['Potasio_mg'].'",
							"Selenio_mcg":"'.$row['Selenio_mcg'].'",
							"Sodio_mg":"'.$row['Sodio_mg'].'",
						    "Zinc_mg":"'.$row['Zinc_mg'].'"},';		
							//$i++;
						}
						$tabla = substr($tabla,0, strlen($tabla) - 1);
					
						return   '{"data":['.$tabla.']}';	
							
							
		
		
    }
	
	
	function leer_categoria()
	{
		$query = $this->db->query("SELECT categoria_id,
										 categoria_descr
										 FROM categoria");
		

						$tabla = "";
						
						foreach($query->result_array() as $row )
						{


					$tabla.='{"categoria_id":"'.$row['categoria_id'].'","categoria_descr":"'.$row['categoria_descr'].'"},';
				

					
						}
						$tabla = substr($tabla,0, strlen($tabla) - 1);
					
						return   '{"data":['.$tabla.']}';	
							
							
		
		
    }
	
	    function delete_categoria(){
		$query = $this->db->query("delete from categoria where categoria_id = ".$this->input->post('categoria_id'));
		return $query;
	}
	
	
		function editar_categoria(){
		$id = $this->input->post('id_categoria');
		$descr = $this->input->post('descr_cate');
			
		$query = $this->db->query("update categoria set categoria_descr = '".$descr."' where categoria_id = ".$id);

		return $query;
	}
	
	// ************************sub categoria metodos *****************************************

function leer_sub_categoria()
	{
		$query = $this->db->query("SELECT * FROM sub_categoria");
		

						$tabla = "";
						
						foreach($query->result_array() as $row )
						{


					$tabla.='{"sub_cate_id":"'.$row['sub_cate_id'].'","sub_cate_descr":"'.$row['sub_cate_descr'].'","categoria_id":"'.$row['categoria_id'].'"},';
				

					
						}
						$tabla = substr($tabla,0, strlen($tabla) - 1);
					
						return   '{"data":['.$tabla.']}';	
							
							
		
		
    }
	
	
	//*****************************cargar combobox categoria***************************************
	
	function recuperar_categoria(){
		$query = $this->db->query("select * from categoria");
		return $query->result();
	}
	
	
	function insertar_sub_categoria()
	{

		$id = $this->input->post('sub_cate_id');
		$descr = $this->input->post('sub_cate_descr');
		$catecoria_id = $this->input->post('categoria_id');
		

		 return  $this->db->query("insert into sub_categoria values(".$id.",'".$descr."',".$catecoria_id.")");
      
	  
    }
	
	function delete_sub_categoria(){
		$query = $this->db->query("delete from sub_categoria where sub_cate_id = ".$this->input->post('sub_cate_id'));
		return $query;
	}
	
	
	function editar_sub_categoria(){
		$id = $this->input->post('sub_cate_id');
		$descr = $this->input->post('sub_cate_descr');
		$categoria_id = $this->input->post('categoria_id');
			
		$query = $this->db->query("update sub_categoria set sub_cate_descr = '".$descr."', categoria_id = ".$categoria_id." where sub_cate_id = ".$id);

		return $query;
	}
	
	
	//***************************************productos****************************************
	
	
	function insertar_producto()
	{

				
		$ID_SUBCATE= $this->input->post('ID_SUBCATE');
		$ID_ALIMENTO= $this->input->post('ID_ALIMENTO');
		$ALIMENTO= $this->input->post('ALIMENTO');
		$Cantidad_gramos= $this->input->post('C1antidad_gramos');
		$Humedad= $this->input->post('Humedad');
		$Calorias= $this->input->post('Calorias');
		$Proteinas_g= $this->input->post('Proteinas_g');
		$Hidratos_g= $this->input->post('Hidratos_g');
		$Fibra_Dietaria_g= $this->input->post('Fibra_Dietaria_g');
		$Lipidos_g= $this->input->post('Lipidos_g');
		$Saturados_g= $this->input->post('Saturados_g');
		$Monoinsat_g= $this->input->post('Monoinsat_g');
		$Polieinsat_g= $this->input->post('Polieinsat_g');
		$Colesterol_mg= $this->input->post('Colesterol_mg');
		$omega_6_g= $this->input->post('omega_6_g');
		$omega_3_g= $this->input->post('omega_3_g');
		$Caroteno_ER= $this->input->post('Caroteno_ER');
		$Retinol_ER= $this->input->post('Retinol_ER');
		$Vitamina_AER= $this->input->post('Vitamina_AER');
		$Vit_B1_mg= $this->input->post('Vit_B1_mg');
		$Vit_B2_mg= $this->input->post('Vit_B2_mg');
		$Niacina_mg= $this->input->post('Niacina_mg');
		$Vit_B6_mg= $this->input->post('Vit_B6_mg');
		$Vit_B12_mg= $this->input->post('Vit_B12_mg');
		$Folatos_mcg= $this->input->post('Folatos_mcg');
		$Pantotenico_mg= $this->input->post('Pantotenico_mg');
		$Vit_C_mg= $this->input->post('Vit_C_mg');
		$Vit_E_mg= $this->input->post('Vit_E_mg');
		$Calcio_mg= $this->input->post('Calcio_mg');
		$Cobre_mg= $this->input->post('Cobre_mg');
		$Hierro_mg= $this->input->post('Hierro_mg');
		$Magnesio_mg= $this->input->post('Magnesio_mg');
		$Fosforo_mg= $this->input->post('Fosforo_mg');
		$Potasio_mg= $this->input->post('Potasio_mg');
		$Selenio_mcg= $this->input->post('Selenio_mcg');
		$Sodio_mg= $this->input->post('Sodio_mg');
		$Zinc_mg= $this->input->post('Zinc_mg');
		
		 return  $this->db->query("INSERT INTO `alimentos`(`ID_SUBCATE`, `ID_ALIMENTO`, `ALIMENTO`, `Cantidad_gramos`, `Humedad`, `Calorias`, `Proteinas_g`, `Hidratos_g`, `Fibra_Dietaria_g`, `Lipidos_g`, `Saturados_g`, `Monoinsat_g`, `Polieinsat_g`, `Colesterol_mg`, `omega_6_g`, `omega_3_g`, `Caroteno_ER`, `Retinol_ER`, `Vitamina_AER`, `Vit_B1_mg`, `Vit_B2_mg`, `Niacina_mg`, `Vit_B6_mg`, `Vit_B12_mg`, `Folatos_mcg`, `Pantotenico_mg`, `Vit_C_mg`, `Vit_E_mg`, `Calcio_mg`, `Cobre_mg`, `Hierro_mg`, `Magnesio_mg`, `Fosforo_mg`, `Potasio_mg`, `Selenio_mcg`, `Sodio_mg`, `Zinc_mg`) values(".$ID_SUBCATE.",".$ID_ALIMENTO.",'".$ALIMENTO."',".$Cantidad_gramos.",".$Humedad.",".$Calorias.",".$Proteinas_g.",".$Hidratos_g.",".$Fibra_Dietaria_g.",".$Lipidos_g.",".$Saturados_g.",".$Monoinsat_g.",".$Polieinsat_g.",".$Colesterol_mg.",".$omega_6_g.",".$omega_3_g.",".$Caroteno_ER.",".$Retinol_ER.",".$Vitamina_AER.",".$Vit_B1_mg.",".$Vit_B2_mg.",".$Niacina_mg.",".$Vit_B6_mg.",".$Vit_B12_mg.",".$Folatos_mcg.",".$Pantotenico_mg.",".$Vit_C_mg.",".$Vit_E_mg.",".$Calcio_mg.",".$Cobre_mg.",".$Hierro_mg.",".$Magnesio_mg.",".$Fosforo_mg.",".$Potasio_mg.",".$Selenio_mcg.",".$Sodio_mg.",".$Zinc_mg.")");
      
	  
    }
	
	
	function recuperar_sub_categoria(){
		$query = $this->db->query("select * from sub_categoria");
		return $query->result();
	}
	
	//********************************dieta cabecera**************************************************************
	
	
	
	function leer_dieta_cabecera()
	{
			$query = $this->db->query("SELECT *
										 FROM dieta_cabecera");
		

						$tabla = "";
						
						foreach($query->result_array() as $row )
						{


					$tabla.='{"id_dieta":"'.$row['id_dieta'].'","nombre":"'.$row['nombre'].'","total_calorias":"'.$row['total_calorias'].'"},';
				

					
						}
						$tabla = substr($tabla,0, strlen($tabla) - 1);
					
						return   '{"data":['.$tabla.']}';	
							
    }
	
	
	
	function insertar_dieta_cabecera()
	{

		$id_dieta = $this->input->post('id_dieta');
		$nombre = $this->input->post('nombre');
		$total = $this->input->post('total');

		 return  $this->db->query("insert into dieta_cabecera values(".$id_dieta.",'".$nombre."',".$total.")");
      
	  
    }
	
	
	function delete_dieta_cabecera(){
		$query = $this->db->query("delete from dieta_cabecera where id_dieta = ".$this->input->post('id_dieta'));
		return $query;
	}
	
	
	function editar_dieta_cabecera(){
		$id = $this->input->post('id_dieta');
		$nombre = $this->input->post('nombre');
		$tot = $this->input->post('tot');
			
		$query = $this->db->query("update dieta_cabecera set nombre = '".$nombre."' , total_calorias = ".$tot."  where id_dieta = ".$id);

		return $query;
	}
	
	
//***************************contador de calorias *****************************************************

	
	function leer_contador()
	{
		$query = $this->db->query("SELECT  ID_ALIMENTO,
		                                 ALIMENTO,
										 Cantidad_gramos,
										 Calorias
										 FROM alimentos");
		
		
						$tabla = "";
						
						foreach($query->result_array() as $row )
						{
							$tabla.='{"ID_ALIMENTO":"'.$row['ID_ALIMENTO'].'",
						    "ALIMENTO":"'.$row['ALIMENTO'].'",
							"Cantidad_gramos":"'.$row['Cantidad_gramos'].'",
						    "Calorias":"'.$row['Calorias'].'"},';		
							//$i++;
						}
						$tabla = substr($tabla,0, strlen($tabla) - 1);
					
						return   '{"data":['.$tabla.']}';	
							
							
		
		
    }
	
}


?>