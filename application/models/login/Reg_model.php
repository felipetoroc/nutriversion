<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function newUser($nombre,$apellidop,$apellidom,$rut,$fechaNac,$email,$telefono,$id_comuna,$direccion,$sexo){
        $rutsinguion = str_replace('-','',$rut);
        $rutsinpuntos = str_replace('.','',$rutsinguion);
        $query = $this->db->query("select validate_rut(".$this->db->escape($rut).") as esrut from dual");
        $query2 = $this->db->query("select valida_mail(".$this->db->escape($email).",".$this->db->escape($rutsinpuntos).") as existe from dual");
        $resultado = $query->row();
        $resultado2 = $query2->row();
        if ($resultado->esrut == 0) {
            return 1;
        }else{
            if($resultado2->existe > 0){
                return 2;
            }else{
                $data = array(
                    'cliente_nombre' => $this->db->escape_str($nombre),
                    'cliente_apellido' => $this->db->escape_str($apellidop." ".$apellidom),
                    'cliente_rut' => $this->db->escape_str($rutsinpuntos),
                    'cliente_email' => $this->db->escape_str($email),
                    'cliente_telefono' => $this->db->escape_str($telefono),
                    'cliente_comuna_id' => $id_comuna,
                    'cliente_direccion' => $this->db->escape_str($direccion),
                    'cliente_fecha_nacimiento' => $fechaNac,
                    'cliente_sexo' => $sexo,
                    'cliente_tipo' => 1,
                    'cliente_imagen_url' => 'img/usuario.jpg'
                );
                $this->db->insert('cliente', $data);    
                return 0;
            }
        }
    }

}
?>