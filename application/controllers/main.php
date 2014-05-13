<?php

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $nombre = $this->session->userdata('nombre');
        if(!($nombre))
        {
        	header("Location: http://localhost/ecodata");
        }
	}

	public function index()
	{
		$this->load->helper(array('form', 'url', 'html'));
		$data['nombre'] = $this->session->userdata('nombre');
		$this->load->view('ingresaExcelVista', $data);
	}

}

/* End of file main.php */
/* Location: ./application/views/main.php */
?>