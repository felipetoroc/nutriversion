<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{


    function __construct()
    {

        // Call the Model constructor

        parent::__construct();

    }

    public function recuperar_id($rut)
    {
        $query1 = $this->db->query("select * from cliente inner join comuna on cliente.cliente_comuna_id = comuna.comuna_id inner join provincia on comuna.comuna_provincia_id = provincia.provincia_id inner join region on provincia.provincia_region_id = region.region_id where cliente_rut = '" . $rut ."'");

        $row = $query1->row();

        if (isset($row)) {
            return $row;

        } else {

            return 0;
        }
    }

    function valida_usuario($rut, $pass)
    {

        $query1 = $this->db->query("select retorna_contrasena('" . $rut . "') as resultado from dual");
        $row = $query1->row();

        if (isset($row)) {
            $passBD = $row->resultado;

            if ($passBD === sha1($pass)) {
                $usuario = $this->recuperar_id($rut);
                $queryNumInicios = $this->db->query("select fn_update_sesion('".$_SERVER['REMOTE_ADDR']."','local',".$usuario->cliente_id.",'inicio') as numInicios from dual;");
                $resQueryNumInicios = $queryNumInicios->row();
                if ($resQueryNumInicios->numInicios > 2 && $passBD == sha1('inicio2017')){
                    $this->session->set_userdata('changepass','si');
                }
                return $usuario;
            }else{
                return 1;
            }
        }else{
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

    function actualiza_pass($id_cliente, $pass)
    {

        $pass_encriptada = sha1($pass);

        $query = $this->db->query("select actualiza_pass(" . $id_cliente . ",'" . $pass_encriptada .
            "') as resultado from dual");

        $row = $query->row();

        if (isset($row)) {

            return $row->resultado;

        }

    }

    function cerrarSesion($id_cliente){
        $this->db->query("select fn_update_sesion('".$_SERVER['REMOTE_ADDR']."','local',".$id_cliente.",'cierre') from dual;");
    }

}

?>