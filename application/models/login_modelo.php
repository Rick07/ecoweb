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

	public function getUsuario($nick)
	{
		
		$query = $this->db->where('nick', $nick);
		$query = $this->db->get('distribuidor');

		 return $query->result_array();
	}

}