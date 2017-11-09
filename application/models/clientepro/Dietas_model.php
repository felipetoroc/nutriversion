<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dietas_model extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function getDietas(){
		$query = $this->db->query("SELECT * FROM dieta_cabecera where estado = 2 or estado = 1");
		$tabla = "";
		foreach($query->result_array() as $row )
		{
			$tabla.='{
			"id_dieta":"'.$row['id_dieta'].'",
			"nombre":"'.$row['nombre'].'",
			"fecha_creacion":"'.$row['fecha_creacion'].'",
            "fecha_modificacion":"'.$row['fecha_modificacion'].'",
            "estado":"'.$row['estado'].'",
            "creado_por":"'.$row['creado_por'].'"
			},';			
		}
		$tabla = substr($tabla,0, strlen($tabla) - 1);
		return   '{"data":['.$tabla.']}';
	}
    
    function crear_dieta(){
        $this->db->query("insert into dieta_cabecera 
        (nombre,fecha_creacion,fecha_modificacion,estado,creado_por) 
        values 
        ('Nueva Dieta',
        now(),now(),2,".$this->session->userdata('id').")");
        
        $query = $this->db->query("select last_insert_id() as id_dieta;");
        $resultado = $query->row();
        
        $result_id_comida= $this->db->query("select distinct id_comida from comida");
        $result_id_categoria = $this->db->query("select distinct categoria_id from categoria");
        foreach($result_id_comida->result_array() as $id_comida ){
            foreach($result_id_categoria->result_array() as $id_categoria){
                $this->db->query("insert into dieta_detalle 
                (id_dieta,id_categoria,id_comida,porciones) 
                values 
                (".$resultado->id_dieta.",".$id_categoria['categoria_id'].",".$id_comida['id_comida'].",0)");
            }
        }

		return $resultado;
        
    }
    
    function modificar_dieta($id_dieta,$id_categoria,$id_comida,$porcion){
        $this->db->query("UPDATE dieta_detalle 
                        SET porciones = ".$porcion."
                        WHERE id_categoria = ".$id_categoria." 
                        AND id_comida = ".$id_comida."
                        AND id_dieta = ".$id_dieta);
        $this->db->query("UPDATE dieta_cabecera SET estado = 2,fecha_modificacion = now() where id_dieta = ".$id_dieta);
        
    }
    
    function modificar_nombre_dieta($id_dieta,$nombre){
        $data = array('nombre' => $nombre,'estado' => 2);
        $this->db->where('id_dieta',$id_dieta);
        $this->db->update('dieta_cabecera',$data);
    }
    
    function confirmar_dieta($id_dieta){
        return $this->db->query("UPDATE dieta_cabecera SET estado = 1,fecha_modificacion = now() where id_dieta = ".$id_dieta);
    }
    
	function delete(){
		$query2 = $this->db->query("update dieta_cabecera set estado = 3,fecha_modificacion = now() where id_dieta = ".$this->input->post('id_dieta'));
		return $query;
	}
    
    public function cargar_columnas_tabla_edicion(){
        $query = $this->db->query("SELECT * FROM comida");
		return $query->result_array();
    }
    public function cargar_filas_tabla_edicion(){
        $query = $this->db->query("SELECT * FROM categoria");
		return $query->result_array();
    }
    function cargar_editor_dieta_cabecera($id_dieta){
        $query = $this->db->query("SELECT * FROM dieta_cabecera where id_dieta = ".$id_dieta);
		return $query->result_array();
    }
    function cargar_editor_dieta($id_dieta){
        $query = $this->db->query("SELECT * FROM dieta_detalle where id_dieta = ".$id_dieta);
		return $query->result_array();
    }
}

?>