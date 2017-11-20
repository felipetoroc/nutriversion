<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cliente_model extends CI_Model {
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    function getEstado(){
        $query = $this->db->get_where('estado_fisico', array('id_cliente' => $this->session->userdata("id"),'prioridad' => 1));
        return $query->result();
	}

	function actualizarUrlM($url){
	  $id=$this->session->userdata('id');
	  $query = $this->db->query("update cliente set cliente_imagen_url = '$url' where cliente_id = '$id'");
	}

	function contar_filas(){
		$query = $this->db->query("select count(*) as num from estado_fisico where id_cliente = ".$this->session->userdata("id"));
		return $query->row();
	}

	function recuperar_estado(){
		$query = $this->db->query("select * from estado_fisico inner join cliente where id_cliente = cliente_id and id_cliente = ".$this->session->userdata("id")." AND fecha_registro = fn_retorna_max_estado( ".$this->session->userdata("id")." )");
		return $query;
	}

    function calculos(){
        //***************calculo de IMC*********************
	    $v_altura = $this->input->post('Altura');
		$v_peso = $this->input->post('Peso');
		$imc = $v_peso/(($v_altura*0.01)*($v_altura*0.01));
		//***************fin calculo imc********************

		//**************inicio de calculo %grasa,masa magra,ccd y tmb *****************************
		$v_cintura = $this->input->post('Cintura');
		$v_cuello =  $this->input->post('Cuello');
		$v_cadera =   $this->input->post('cadera');
		$nivel_actividad = $this->input->post('factor');
		//recuperar sexo
        $v_sexo = $this->db->query('select retorna_sexo('.$this->session->userdata("id").') from dual');
		if($v_sexo == 1){
	        $porcentajeGrasa=495/(1.0324-0.19077*(log10($v_cintura-$v_cuello))+0.15456*(log10($v_altura)))-450;
            $porcentajeGrasa2=round($porcentajeGrasa,1);
            $Masacorporalmagra = ($v_peso *(100 - $porcentajeGrasa2))*0.01;
            $Masacorporalmagra2=round($Masacorporalmagra,1);
            $tmb = 370 + (21.6 * $Masacorporalmagra);
            $ccd=$tmb*$nivel_actividad;
		}
	    if($v_sexo == 2) {
            $porcentajeGrasa=495/(1.29579-0.35004*(log10($v_cintura+$v_cadera-$v_cuello))+0.22100*(log10($v_altura)))-450;
            $porcentajeGrasa2=round($porcentajeGrasa,1);
            $Masacorporalmagra = ($v_peso *(100 - $porcentajeGrasa2))*0.01;
            $Masacorporalmagra2=round($Masacorporalmagra,1);
            $tmb = 370 + (21.6 * $Masacorporalmagra);
            $ccd=$tmb*$nivel_actividad;
		}

		$queryInsert = "insert into estado_fisico
		(
		 id_cliente
		, edad
		, altura
		, peso
		, cintura
		, cuello
		, cadera
		, nivel_actividad
		, fecha_registro
		, imc
		, porcentaje_grasa
		, masa_magra
		, tmb
		, ccd
		)
		values 
		(
		".$this->session->userdata('id').",".
		$this->input->post('edad').",".
		$this->input->post('Altura').",".
		$this->input->post('Peso').",".
		$this->input->post('Cintura').",".
		$this->input->post('Cuello').",".
		$this->input->post('cadera').",".
		$this->input->post('factor')."
		,now(),".
		$imc.",".
		$porcentajeGrasa2.",".
		$Masacorporalmagra2.",".
		$tmb.",".
		$ccd.")";
        $result =$this->db->query($queryInsert);
		return  $result;
	}
	//***************************contador de calorias *****************************************************

	function leer_contador(){
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

	function insertar_contador_cobecera(){
		//$id = $this->input->post('id_comida');
		//$descr = $this->input->post('id_alimento');
		//$catecoria_id = $this->input->post('cantidad');
		//$catecoria_id = $this->input->post('total_calorias');
		$cliente = $this->session->userdata('id');
		$query  = $this->db->query("SELECT COUNT(*) valida FROM contador_calorias_cabecera WHERE fecha = date(SYSDATE()) and id_cliente = ".$cliente);
		$valida = $query->row();
		$lala =  $valida->valida;
		//return $lala;
		if($lala == 0)
		{
	        $mama=$this->db->query("insert into contador_calorias_cabecera (id_cliente,fecha,total_calorias) values(".$cliente.",date(sysdate()),0)");
		    return $mama;
		}
    }

	function insertar_contador_detalle(){
		$cliente = $this->session->userdata('id');
		$id_comida = $this->input->post('id_comida');
		$id_alimento = $this->input->post('id_alimento');
		$cantidad = $this->input->post('cantidad');
		$total_calorias = $this->input->post('total_calorias');
		$query  = $this->db->query("select insert_cont_detalle(".$cliente.",".$id_alimento.",".$id_comida.",".$cantidad.",".$total_calorias.") as valida  from dual");
		//$valida = $query->row();
		//$id_cabecera =  $valida->valida;
		$lala = $query->row();
		$valida= $lala->valida;
		return  $valida;
    }

	function leer_contador_cliente(){
		$cliente = $this->session->userdata('id');
		$fecha_detalle = date("Y-m-d");
		if($this->session->userdata('fecha_detalle')){
			$fecha_detalle = $this->session->userdata('fecha_detalle');
		}
		$query = $this->db->query("select 
		                             det.id_detalle as  id_detalle
									,cli.cliente_nombre as cliente
									,cab.fecha as  fecha
									,co.nombre as comida
									,ali.alimento as  alimento
									,sum(det.cantidad) as cantidad
									,sum(det.calorias) as calorias
									from 
									contador_calorias_cabecera cab
									inner join contador_calorias_detalle det on  cab.id_cabecera = det.id_cabecera
									inner join cliente cli on cab.id_cliente = cli.cliente_id 
									inner join comida co on det.id_comida = co.id_comida
									inner join alimentos ali on det.id_alimento = ali.id_alimento
									where cab.fecha   = '".$fecha_detalle."'
									and  cab.id_cliente =".$cliente." 
									group by cli.cliente_nombre
									,cab.fecha
									,co.nombre
									,ali.alimento
									order by cli.cliente_nombre
									,cab.fecha
									,co.id_comida
									,ali.alimento");
		$tabla = "";
        foreach($query->result_array() as $row ){
            $tabla.='{"id_detalle":"'.$row['id_detalle'].'",
                "cliente":"'.$row['cliente'].'",
                "fecha":"'.$row['fecha'].'",
                "comida":"'.$row['comida'].'",
                "alimento":"'.$row['alimento'].'",
                "cantidad":"'.$row['cantidad'].'",
                "calorias":"'.$row['calorias'].'"},';
        }
        $tabla = substr($tabla,0, strlen($tabla) - 1);
        return   '{"data":['.$tabla.']}';
    }

	function delete_detalle_contador(){
		$query = $this->db->query("delete from contador_calorias_detalle where id_detalle = ".$this->input->post('id_detalle'));
		return $query;
	}

	function rescatar_total_calorias(){
		$query  = $this->db->query("select insert_cont_detalle(".$cliente.",".$id_alimento.",".$id_comida.",".$cantidad.",".$total_calorias.") as valida  from dual");
	}
	//funcion que valida el paso del tiempo del estado fisico
	function Valida_estado_fisico(){
		$query = $this->db->query("SELECT Valida_estado_fisico(".$this->session->userdata("id").") lala FROM dual");
		return $query->row();
	}

    //funcion que retorna los datos del grafico del cliente.
	function Infromacion_peso_grafico(){
        $query = $this->db->query("SELECT fecha_registro fecha, peso FROM estado_fisico WHERE id_cliente =".$this->session->userdata("id"));
        $data = array();
		foreach ($query->result() as $row){
            $data[] = $row;
        }
        return json_encode($data);
	}

	function getDietaByIdCliente($id_cliente){
        $this->db->select_max('fecha');
        $this->db->where('id_cliente',$id_cliente);
        $query1 = $this->db->get('cliente_dieta');
	    $ultimaFecha = $query1->row("fecha");
        $this->db->flush_cache();
        $this->db->select('*');
        $this->db->from('dieta_detalle');
        $this->db->join('dieta_cabecera','dieta_detalle.id_dieta = dieta_cabecera.id_dieta','inner');
        $this->db->join('cliente_dieta','dieta_cabecera.id_dieta = cliente_dieta.id_dieta','inner');
        $this->db->where('cliente_dieta.id_cliente',$id_cliente);
        $this->db->where('cliente_dieta.fecha',$ultimaFecha);
        $query = $this->db->get();
        $json = json_encode($query->result());
        return $json;
    }
    public function cargar_columnas_tabla_dieta(){
        $query = $this->db->get("comida");
        return $query->result_array();
    }
    public function cargar_filas_tabla_dieta(){
        $query = $this->db->get("categoria");
        return $query->result_array();
    }

    public function getAlimentosConsumidos($id_cliente){

        $query = $this->db->query("select
                                     a.id_cliente 
                                    ,c.categoria_id
                                    ,b.id_comida
                                    ,b.cantidad as porcion
                                    from contador_calorias_cabecera a
                                    inner join  contador_calorias_detalle b on a.id_cabecera = b.id_cabecera
                                    inner join alimentos m  on b.id_alimento = m.ID_ALIMENTO 
                                    inner join sub_categoria x on x.sub_cate_id = m.ID_SUBCATE 
                                    inner join categoria c on  x.categoria_id = c.categoria_id
                                    inner join comida d on b.id_comida = d.id_comida
                                    where a.id_cliente = $id_cliente
                                    and fecha = date_format(now(),'%Y-%m-%d')
                                    group by
                                    a.id_cliente 
                                    ,c.categoria_id
                                    ,b.id_comida
                                    order by
                                    a.id_cliente 
                                    ,c.categoria_id
                                    ,b.id_comida;");
        return $query->result_array();
    }
}
?>