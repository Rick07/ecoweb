<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instalaciones extends CI_Controller {

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
		$data['id'] = $this->session->userdata('id');
		$this->load->model('state_modelo');
		$data['state'] = $this->state_modelo->listarEstados();
		$this->load->view('instalaciones/instalaciones_vista', $data);
	}

	public function nuevaInstalacion()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tipoSistema', 'Sistema', 'trim|required');
		$this->form_validation->set_rules('tipoCategoria', 'Categoria', 'trim|required');
		$this->form_validation->set_rules('tipoCompra', 'Compra', 'trim|required');
		$this->form_validation->set_rules('direccion', 'Direccion', 'trim|required');
		$this->form_validation->set_rules('nombreInstalacion', 'Instalacion', 'trim|required');
		$this->form_validation->set_rules('zona', 'Estado', 'trim|required');
		$this->form_validation->set_rules('idDistribuidor', 'Distribuidor', 'trim|required');
		if($this->form_validation->run() == FALSE)
			{
			   exit();
			}
			else
			{
				$this->load->model('instalaciones_modelo');
				$this->instalaciones_modelo->nuevaInstalacion();
			}
		
	}

	public function listarInstalaciones()
	{
		//$id = $this->session->userdata('id');
		$this->load->model('instalaciones_modelo');
		$datos = $this->instalaciones_modelo->listarInstalacionesIdDist();
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

}

/* End of file instalacion.php */
/* Location: ./application/controllers/instalacion.php */
?>