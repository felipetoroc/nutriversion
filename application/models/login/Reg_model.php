<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function newUser($nombre,$apellido,$rut,$fechaNac,$email,$telefono,$sexo,$objetivo){
        $query = $this->db->query("select validate_rut(".$this->db->escape($rut).") as esrut from dual");
        $resultado = $query->row();
        if ($resultado->esrut > 0) {
            $data = array(
                'cliente_nombre' => $this->db->escape_str($nombre),
                'cliente_apellido' => $this->db->escape_str($apellido),
                'cliente_rut' => $this->db->escape_str($rut),
                'cliente_email' => $this->db->escape_str($email),
                'cliente_telefono' => $this->db->escape_str($telefono),
                'cliente_fecha_nacimiento' => $fechaNac,
                'cliente_sexo' => $sexo,
                'objetivo' => $objetivo,
                'cliente_tipo' => 1,
                'cliente_imagen_url' => 'img/usuario.jpg'
            );
            $this->db->insert('cliente', $data);
        }
        return $resultado;
    }

    function getObjetivos(){
        $query = $this->db->get('objetivo');
        return $query->result();
    }
}
?>