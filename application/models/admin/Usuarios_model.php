<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function getUsers(){
		$query = $this->db->query("SELECT * FROM cliente 
			left join comuna on cliente_comuna_id = comuna_id
			inner join tipo_cliente on cliente.cliente_tipo = tipo_cliente.id_tipo_cliente");
		$tabla = "";
		
		foreach($query->result_array() as $row )
		{
			$tabla.='{
			"cliente_id":"'.$row['cliente_id'].'",
			"cliente_rut":"'.$row['cliente_rut'].'",
			"cliente_nombre":"'.$row['cliente_nombre'].'",
			"cliente_apellido":"'.$row['cliente_apellido'].'",
			"cliente_fecha_nacimiento":"'.$row['cliente_fecha_nacimiento'].'",
			"cliente_comuna_id":"'.$row['cliente_comuna_id'].'",
			"COMUNA_NOMBRE":"'.$row['COMUNA_NOMBRE'].'",
			"cliente_direccion":"'.$row['cliente_direccion'].'",
			"cliente_usuario":"'.$row['cliente_usuario'].'",
			"cliente_email":"'.$row['cliente_email'].'",
			"cliente_celular":"'.$row['cliente_celular'].'",
			"cliente_telefono":"'.$row['cliente_telefono'].'",
			"cliente_tipo":"'.$row['cliente_tipo'].'",
			"tipo_cliente_descl":"'.$row['tipo_cliente_descl'].'"
			},';		
		}
		$tabla = substr($tabla,0, strlen($tabla) - 1);
	
		return   '{"data":['.$tabla.']}';	
	}
	function insert(){
	    $respuesta = "";
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$fecha_nacimiento = $this->input->post('fecha_nacimiento');
		$comuna = $this->input->post('comuna');
		$usuario = $this->input->post('usuario');
		$email = $this->input->post('email');
		$celular = $this->input->post('celular');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$tipo = $this->input->post('tipo');
		
		$query = $this->db->query("insert into cliente ( 
		cliente_nombre,
		cliente_apellido,
		cliente_fecha_nacimiento,
		cliente_comuna_id,
		cliente_usuario,
		cliente_email,
		cliente_celular,
		cliente_telefono,
		cliente_direccion,
		cliente_tipo )
		VALUES (
		'$nombre',
		'$apellido',
		'$fecha_nacimiento',
		'$comuna',
		'$usuario',
		'$email',
		'$celular',
		'$telefono',
		'$direccion',
		'$tipo')");
		return $query;
	}

	function edit(){
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$fecha_nacimiento = $this->input->post('fecha_nacimiento');
		$comuna = $this->input->post('comuna');
		$usuario = $this->input->post('usuario');
		$email = $this->input->post('email');
		$celular = $this->input->post('celular');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$tipo = $this->input->post('tipo');
		
		$query = $this->db->query("update cliente set 
		cliente_nombre = '$nombre',
		cliente_apellido = '$apellido',
		cliente_fecha_nacimiento = '$fecha_nacimiento',
		cliente_comuna_id = '$comuna',
		cliente_usuario = '$usuario',
		cliente_email = '$email',
		cliente_celular = '$celular',
		cliente_telefono = '$telefono',
		cliente_direccion = '$direccion',
		cliente_tipo = '$tipo'
		where cliente_id = '$id'");
	}
	
	function delete($id_cliente){
		$query1 = $this->db->query("select count(*) as num from cliente_dieta where id_cliente = $id_cliente");
		$res = $query1->row();
		if ($res->num > 0){
			return 0;
		}else{
			$this->db->flush_cache();
			$this->db->where('id_cliente', $id_cliente);
			$this->db->delete('sesion');
			$this->db->flush_cache();
			$this->db->where('cliente_id', $id_cliente);
			return $this->db->delete('cliente');
		}
	}

	function newUser($nombre,$apellidop,$apellidom,$rut,$fechaNac,$email,$telefono,$id_comuna,$direccion,$sexo,$tipo,$sucursal){
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
                    'cliente_tipo' => $tipo,
                    'cliente_imagen_url' => 'img/usuario.jpg'
                );
                $this->db->insert('cliente', $data);    
                return 0;
            }
        }
    }

    function editUser($id_cliente,$nombre,$apellidop,$apellidom,$rut,$fechaNac,$email,$telefono,$id_comuna,$direccion,$sexo,$tipo,$sucursal){
        $data = array(
            'cliente_nombre' => $this->db->escape_str($nombre),
            'cliente_apellido' => $this->db->escape_str($apellidop." ".$apellidom),
            'cliente_telefono' => $this->db->escape_str($telefono),
            'cliente_comuna_id' => $id_comuna,
            'cliente_direccion' => $this->db->escape_str($direccion),
            'cliente_fecha_nacimiento' => $fechaNac,
            'cliente_sexo' => $sexo,
            'cliente_tipo' => $tipo,
            'cliente_imagen_url' => 'img/usuario.jpg'
        );
        $this->db->where('cliente_id', $id_cliente);
		return $this->db->update('cliente', $data);
    
    }

    function getUsersById($id_usuario){
    	$id = $this->db->escape($id_usuario);
    	$query = $this->db->query("SELECT * FROM cliente 
			left join comuna on cliente_comuna_id = comuna_id
			inner join tipo_cliente on cliente.cliente_tipo = tipo_cliente.id_tipo_cliente
			left join cliente_dieta on cliente_dieta.id_cliente = cliente.cliente_id
			where cliente_id = $id
			limit 1");
    	return $query->row();

    }
}
?>