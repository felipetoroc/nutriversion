<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{


    function __construct()
    {

        // Call the Model constructor

        parent::__construct();

    }

    public function recuperar_id($usuario, $tipo)
    {
        $query1 = $this->db->query("select * from cliente where cliente_usuario = '" . $usuario .
            "' and cliente_tipo = '" . $tipo . "'");

        $row = $query1->row();

        if (isset($row)) {
            $this->session->set_userdata('nombre', $row->cliente_nombre);
            $this->session->set_userdata('apellido', $row->cliente_apellido);
            $this->session->set_userdata('email', $row->cliente_email);
            $this->session->set_userdata('imagen_url', $row->cliente_imagen_url);
            return $row->cliente_id;

        } else {

            return 0;
        }
    }

    function valida_usuario($usuario, $pass, $tipo)
    {

        $query1 = $this->db->query("select retorna_contrasena('" . $usuario . "','" . $tipo .
            "') as resultado from dual");

        $row = $query1->row();

        if (isset($row)) {

            $pass_desencriptada = $this->encrypt->decode($row->resultado);

            if ($pass_desencriptada == $pass) {

                $usuario_id = $this->recuperar_id($usuario, $tipo);
                return $usuario_id;

            }

        } else {

            return 0;

        }

    }

    function sumarInicio($id, $n_inicios)
    {

        $data = array('cliente_inicios_sesion' => $n_inicios + 1);

        $this->db->where('cliente_id', $id);

        $this->db->update('cliente', $data);

    }

    function verificar_pw($pw)
    {

        $this->decode_pw = $this->encrypt->decode($pw);

        if ($this->decode_pw == $this->password) {

            return true;

        } else {

            return false;

        }

    }


    function valida_mail($mail)
    {

        $query = $this->db->query("select valida_mail('" . $mail .
            "') as resultado from dual");

        $row = $query->row();

        if (isset($row)) {

            return $row->resultado;

        }

    }

    function actualiza_pass($mail, $pass)
    {

        $pass_encriptada = $this->encrypt->encode($pass);

        $query = $this->db->query("select actualiza_pass('" . $mail . "','" . $pass_encriptada .
            "') as resultado from dual");

        $row = $query->row();

        if (isset($row)) {

            return $row->resultado;

        }

    }

}

?>