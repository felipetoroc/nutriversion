<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ClientePro_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getClientes(){
        $query = $this->db->get_where('cliente', array('cliente_tipo' => 'common'));
        $json = json_encode(array('data' => $query->result()));
        return $json;
    }
    function getClientebyid($id_cliente){
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->join('estado_fisico', 'cliente.cliente_id = estado_fisico.id_cliente','LEFT');
        $this->db->join('cliente_dieta','cliente.cliente_id = cliente_dieta.id_cliente','LEFT');
        $this->db->join('dieta_cabecera','cliente_dieta.id_dieta = dieta_cabecera.id_dieta','LEFT');
        $this->db->join('dieta_detalle','dieta_cabecera.id_dieta = dieta_detalle.id_dieta','LEFT');
        $this->db->where('cliente_tipo','common');
        $this->db->where('cliente_id',$id_cliente);
        $query = $this->db->get();
        $json = json_encode($query->result());
        return $json;
    }
}
?>