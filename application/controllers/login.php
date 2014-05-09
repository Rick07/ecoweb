<?php

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
	
		/*if (!$this->agent->is_browser('Chrome') && !$this->agent->is_browser('Safari'))
				{
					show_404();
				}*/

    }

    public function index()
    {
        $this->load->helper('form');
    	$this->load->helper('url');
    	$this->load->library('form_validation');
        $data['title']="EcoData";

    	$ingresar = $this->input->post('ingresar');
    	if(!$ingresar)
    	{
    		$this->load->view('login_vista', $data);
    	}
    	else
    	{
    		$this->form_validation->set_rules('nick', 'Nombre de usuario', 'trim|required');
    		$this->form_validation->set_rules('password', 'contraseña', 'trim|required');

    		if($this->form_validation->run() == FALSE)
    		{
                $this->load->view('login_vista', $data);
    		}
    		else
    		{
    			$this->load->model('login_modelo');
                $nick = $this->input->post('nick');
                $pass = $this->input->post('password');
                $iniciar = $this->login_modelo->verificar_login($nick, $pass); 

    			if($iniciar)
    			{
                    $dato = $this->login_modelo->verifica_usuario_nivel($nick);

                    foreach ($dato as $key) {
                        $usu = $key['username'];
                        $nivel = $key['nivel'];
                    }

                    $this->load->library('session');
                    $data = array('usu' => $usu,
                                    'nivel' => $nivel);
                    
                    $this->session->set_userdata($data);
                    header("Location: http://localhost/AlmacenMedico/index.php/menu");
    			}
    			else
    			{
                    $data['title']="Almacen Médico";
    				//$data['error']="No Estas Autorizado, por favor ingresa correctamente tus datos para acceder al sistema.";
					$data['error']="SE ESTA REALIZANDO MANTENIMIENTO EN ESTE MOMENTO. POR FAVOR INTENTA ACCEDER MAS TARDE.";
                    $this->load->view('login_vista', $data);
    			}
    		}
    	}
    }
}

 ?>
