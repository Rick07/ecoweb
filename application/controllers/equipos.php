<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipos extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $nombre = $this->session->userdata('nombre');
        $this->load->helper('url');
        if(!($nombre))
        {
           redirect('login');
        }
        $this->load->helper(array('form', 'html'));
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $this->load->model('instalaciones_modelo');
        $data['instalacion'] = $this->instalaciones_modelo->listarInstalacionesIdDist($id);
        $this->load->view('equipos/equipos_vista', $data);
    }

    public function nuevoEquipo()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tipoEquipo', 'Equipo', 'trim|required');
        $this->form_validation->set_rules('numeroParte', 'Numero de parte', 'trim|required');
        $this->form_validation->set_rules('serie', 'Serie', 'trim|required');
        $this->form_validation->set_rules('modelo', 'modelo', 'trim|required');
        $this->form_validation->set_rules('instalacion', 'Instalacion', 'trim|required');
        if($this->form_validation->run() == FALSE)
            {
               exit();
            }
            else
            {
                $this->load->model('equipos_modelo');
                $this->equipos_modelo->nuevoEquipo();
            }
        
    }

    public function listarEquipos()
    {
        $id = $this->session->userdata('id');
        $this->load->model('equipos_modelo');
        $datos = $this->equipos_modelo->listarEquiposIdDist($id);
        $data = array();
        
        foreach($datos as $key)
                    {
                        $data[] = $key;
                    }

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $data;
        print json_encode($jTableResult);

    }

    public function borrarEquipo()
    {
        $id = $this->input->post('idequipo');
        $this->load->model('equipos_modelo');
        $this->equipos_modelo->borrarEquipo($id);

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        print json_encode($jTableResult);
    }

}

/* End of file equipos.php */
/* Location: ./application/controllers/equipos.php */
?>