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
    }

	public function index()
	{
		$this->load->view('charts/charts_vista');
	}

     public function data()
    {
        $this->load->model('charts_modelo');
        $data = $this->charts_modelo->get_data();
        
        $category = array();
        $category['name'] = 'Fecha';
        
        $series1 = array();
        $series1['name'] = 'Energia generada al día';
        
        foreach ($data as $row)
        {
            $category['data'][] = $row->fecha;
            $series1['data'][] = $row->energiageneradadia;
        }
        
        $result = array();
        array_push($result,$category);
        array_push($result,$series1);
        
        print json_encode($result, JSON_NUMERIC_CHECK);
    }

}

/* End of file plots.php */
/* Location: ./application/controllers/plots.php */
?>