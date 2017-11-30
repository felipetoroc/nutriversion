<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ClientePro_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getClientes(){
        $query = $this->db->get_where('cliente', array('cliente_tipo' => '1'));
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
        $this->db->where('cliente_tipo','1');
        $this->db->where('cliente_id',$id_cliente);
        $query = $this->db->get();
        $json = json_encode($query->result());
        return $json;
    }

    function asignarDietaACliente($id_cliente,$id_dieta){
        $data = array(
            'id_cliente' => $id_cliente,
            'id_dieta' => $id_dieta,
            'fecha' => date('Y/m/d H:i:s')
        );

        $this->db->insert('cliente_dieta', $data);
    }
    function calculos($id_cliente,$altura,$peso,$cuello,$cintura,$cadera,$factor,$objetivo){
        //***************calculo de IMC*********************
        $v_altura = $altura;
        $v_peso = $peso;
        $imc = $v_peso/(($v_altura*0.01)*($v_altura*0.01));
        //***************fin calculo imc********************

        //**************inicio de calculo %grasa,masa magra,ccd y tmb *****************************
        $v_cintura = $cintura;
        $v_cuello =  $cuello;
        $v_cadera =   $cadera;
        $nivel_actividad = $factor;
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
        ".$id_cliente.",".
        $altura.",".
        $peso.",".
        $cintura.",".
        $cuello.",".
        $cadera.",".
        $factor."
        ,now(),".
        $imc.",".
        $porcentajeGrasa2.",".
        $Masacorporalmagra2.",".
        $tmb.",".
        $ccd.")";
        $this->db->query($queryInsert);
        $queryIdEstado = $this->db->query("select id from estado_fisico where id_cliente = $id_cliente and fecha_registro = (select max(fecha_registro) from estado_fisico where id_cliente = $id_cliente)");
        $idEstado = $queryIdEstado->row();
        $queryInsertObj = "insert into objetivo_estado_fisico
        (id_objetivo,id_estado_fisico,fecha) values
        ($objetivo,$idEstado->id,now())";
        $result = $this->db->query($queryInsertObj);
        return  $result;
    }
     function getObjetivos(){
        $query = $this->db->get("objetivo");
        return $query->result_array();
    }
    function getEnfermedades(){
        $query = $this->db->get("enfermedad");
        return $query->result_array();
    }
    function getAlergias(){
        $query = $this->db->get("alergias");
        return $query->result_array();
    }
}
?>