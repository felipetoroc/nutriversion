<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Clientepro extends CI_Controller
{
    //en funcionamiento
    public function index()
    {
        $this->load->view('clientepro/head_view');
        $this->load->view('clientepro/baner_view');
        $this->load->view('clientepro/topbar_view');
        $this->load->view('clientepro/principal_view');
        $this->load->view('clientepro/foot_view');
    }
    
    //en funcionamiento

     public function ReporteEstadoFisico()
    {
        $this->load->view('clientepro/head_view');
        $this->load->view('clientepro/baner_view');
        $this->load->view('clientepro/topbar_view');
        $this->load->view('clientepro/Reporte_estado_fisico_view');
        $this->load->view('clientepro/foot_view');
    }
    public function ReporteAlimentos()
    {
        $this->load->view('clientepro/head_view');
        $this->load->view('clientepro/baner_view');
        $this->load->view('clientepro/topbar_view');
        $this->load->view('clientepro/Reporte_alimentos_view');
        $this->load->view('clientepro/foot_view');
    }
    public function dietas()
    {
        $this->load->view('clientepro/head_view');
        $this->load->view('clientepro/baner_view');
        $this->load->view('clientepro/topbar_view');
        $this->load->view('clientepro/mant_dietas_view');
        $this->load->view('clientepro/foot_view');
    }

    //en funcionamiento
    public function editordietas()
    {
        if($this->input->post("id_dieta") != ""){
            if ($this->input->post("editar")) {
                $id_dieta = $this->input->post("id_dieta");
                $this->load->model('clientepro/dietas_model');
                $data['columnas'] = $this->dietas_model->cargar_columnas_tabla_edicion();
                $data['filas'] = $this->dietas_model->cargar_filas_tabla_edicion();
                $data['datos_dieta'] = $this->dietas_model->cargar_editor_dieta($id_dieta);
                $data['datos_dieta_cabecera'] = $this->dietas_model->cargar_editor_dieta_cabecera($id_dieta);
                $data['calorias'] = $this->dietas_model->getCaloriasDieta($id_dieta);
                $this->load->view('clientepro/head_view');
                $this->load->view('clientepro/baner_view');
                $this->load->view('clientepro/topbar_view');
                $this->load->view('clientepro/edit_dietas_view',$data);
                $this->load->view('clientepro/foot_view');
            }
        }else{
            redirect("clientepro/dietas");
        }
        
    }
    
    public function modificar_dieta(){
        $id_dieta = $this->input->post('id_dieta');
        $id_comida = $this->input->post('id_comida');
        $id_categoria = $this->input->post('id_categoria');
        $porcion = $this->input->post('porcion');
        $nombre_dieta = $this->input->post('nombre_dieta');
        
        $this->load->model('clientepro/dietas_model');
        
        if ($id_comida != null){
            $this->dietas_model->modificar_dieta($id_dieta,$id_categoria,$id_comida,$porcion);
        }else{
            $this->dietas_model->modificar_nombre_dieta($id_dieta,$nombre_dieta);
        }
        
    }
    //en funcionamiento
    public function confirmar_dieta(){
        $id_dieta = $this->input->post('id_dieta');
        $this->load->model('clientepro/dietas_model');
        
        if ($id_dieta != null){
            $resultado = $this->dietas_model->confirmar_dieta($id_dieta);
            if ($resultado > 0){
                echo "Dieta confirmada, puede ser usada por nuestros usuarios";
            }
        }
        
    }
    //en funcionamiento
    public function crear_dieta()
    {
        if ($this->input->post("nuevo")){
            $this->load->model('clientepro/dietas_model');
            $resultado = $this->dietas_model->crear_dieta();
        }
    }
    
    //en funcionamiento
    public function dietas_data()
    {
        $this->load->model('clientepro/dietas_model');
        echo $this->dietas_model->getDietas();
    }

    //en funcionamiento
    public function eliminar_dieta()
    {
        if ($this->input->post("id_dieta")) {
            $this->load->model('clientepro/dietas_model');
            echo $this->dietas_model->delete();
        }
    }

    public function getClientes(){
        $this->load->model('clientepro/clientePro_model');
        print_r($this->clientePro_model->getClientes());
    }
    public function getClientebyid(){
        $this->load->model('clientepro/clientePro_model');
        print_r($this->clientePro_model->getClientebyid($this->input->post('id_cliente')));
    }

    public function clientes(){
        $this->load->model('clientepro/dietas_model');
        $data['columnas'] = $this->dietas_model->cargar_columnas_tabla_edicion();
        $data['filas'] = $this->dietas_model->cargar_filas_tabla_edicion();
        $this->load->view('clientepro/head_view');
        $this->load->view('clientepro/baner_view');
        $this->load->view('clientepro/topbar_view');
        $this->load->view('clientepro/detalles_clientes_view',$data);
        $this->load->view('clientepro/foot_view');
    }

    public function setFlashDataIdCliente(){
        if ($this->input->post("id_cliente")) {
            $this->session->set_userdata('id_cliente',$this->input->post("id_cliente"));
            $this->session->set_userdata('nombre_cliente',$this->input->post("nombre_cliente"));
            $this->session->set_userdata('apellido_cliente',$this->input->post("apellido_cliente"));
            $this->session->set_userdata('ccd',$this->input->post("ccd"));

            if($this->input->post('btn') == 'dieta'){
                echo base_url()."index.php/clientepro/dietas";
            }else if($this->input->post('btn') == 'estado'){
                echo base_url()."index.php/clientepro/editarestado";
            }
            
        }
    }

    public function asignarDietaACliente(){
        if ($this->input->post("id_cliente")) {
            $this->load->model('clientepro/clientePro_model');
            $this->clientePro_model->asignarDietaACliente($this->input->post("id_cliente"),$this->input->post("id_dieta"));
            echo base_url()."index.php/clientepro/clientes";
        }else{

        }
    }

    public function getCaloriasDieta(){
        $id_dieta = $this->input->post('id_dieta');
        $this->load->model('clientepro/dietas_model');
        $resultado = $this->dietas_model->getCaloriasDieta($id_dieta);
        echo $resultado;
    }
    public function cancelarAsignacion(){
        $this->session->unset_userdata('id_cliente');
        $this->session->unset_userdata('nombre_cliente');
        $this->session->unset_userdata('apellido_cliente');
        $this->session->unset_userdata('ccd');
        echo base_url('index.php/clientepro/clientes');
    }

    public function editarestado(){
        $this->load->model('clientepro/clientePro_model');
        $data['objetivos'] = $this->clientePro_model->getObjetivos();
        $data['enfermedades'] = $this->clientePro_model->getEnfermedades();
        $data['alergias'] = $this->clientePro_model->getAlergias();
        $this->load->view('clientepro/head_view');
        $this->load->view('clientepro/baner_view');
        $this->load->view('clientepro/topbar_view');
        $this->load->view('clientepro/edit_estado_view',$data);
        $this->load->view('clientepro/foot_view');
    }
    public function nuevo_estado(){
        $id_cliente = $this->session->userdata('id_cliente');
        $altura = $this->input->post('Altura');
        $peso = $this->input->post('Peso');
        $cuello = $this->input->post('Cuello');
        $cintura = $this->input->post('Cintura');
        $cadera = $this->input->post('Cadera');
        $factor = $this->input->post('factor');
        $objetivo = $this->input->post('objetivo');
        $this->load->model("clientepro/clientePro_model");
        //echo $this->cliente_model->insertar_estado();
        if($this->clientePro_model->calculos($id_cliente,$altura,$peso,$cuello,$cintura,$cadera,$factor,$objetivo)){
            redirect('clientepro/clientes');
        }
    }
}

?>