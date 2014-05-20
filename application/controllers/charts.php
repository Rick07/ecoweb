<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts extends CI_Controller {

	public function __construct()
    {
       parent::__construct();

        $this->load->library('session');
        $nombre = $this->session->userdata('nombre');
        $this->load->helper(array('form', 'url', 'html'));
        if(!($nombre))
        {
           redirect('login');
        }
        $this->load->model('charts_modelo');
    }

	public function index()
	{
		$this->load->view('charts/charts_vista');
	}

     public function datosDia()
    {
        $result = $this->charts_modelo->getDataDay();
        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function datosHora()
    {
        $result = $this->charts_modelo->getDataHour();
        print json_encode($result, JSON_NUMERIC_CHECK);
    }

}

/* End of file plots.php */
/* Location: ./application/controllers/plots.php */
?>