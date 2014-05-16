<?php

class Login_modelo extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	public function verificarLogin($nick, $pass)
	{
		$query = $this->db->where('nick', $nick);
		$query = $this->db->where('password', $pass);
		$query = $this->db->get('distribuidor');

		return $query->row();
	}

	public function getUsuarioIdNombre($nick)
	{
		
		$query = $this->db->where('nick', $nick);
		$query = $this->db->get('distribuidor');

		$dato = $query->result_array();

		 foreach($dato as $key)
                    {
                    	$id = $key['iddistribuidor'];
                        $nombre = $key['nombre'];
                    }

         $datos = array('id' => $id,
         				'nombre' => $nombre);

		 return $datos;
	}

}