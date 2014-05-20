<?php

class Main extends CI_Controller {

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
    $data['id'] = $this->session->userdata('id');
    $data['nombre'] = $this->session->userdata('nombre');
    $this->load->view('main_vista', $data);
  }

  public function salir()
  { 
      $this->session->sess_destroy();//cerramos la sesion
      redirect("login");
  }

}

/* End of file main.php */
/* Location: ./application/views/main.php */
?>