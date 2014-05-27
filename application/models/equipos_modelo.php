<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipos_modelo extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	public function listarEquiposIdDist($id)
	{
		$query = $this->db->where('distribuidorid', $id);
		$query = $this->db->join('instalacion', 'equipo.instalacionid = instalacion.idinstalacion');
		$query = $this->db->join('distribuidor', 'instalacion.distribuidorid = distribuidor.iddistribuidor');
		$query = $this->db->get('equipo');
		return $query->result_array();
	}

	public function listarEquiposIdInstalacion($idinstalacion)
	{
		$query = $this->db->where('instalacionid', $idinstalacion);
		$query = $this->db->get('equipo');
		return $query->result_array();
	}

	public function nuevoEquipo()
	{
		$data = array('tipo' => $this->input->post('tipoEquipo'),
			'numeroparte' => $this->input->post('numeroParte'),
			'serie' => $this->input->post('serie'),
			'modelo' => $this->input->post('modelo'),
			'instalacionid' => $this->input->post('instalacion'));

		return $this->db->insert('equipo', $data);
	}

	public function borrarEquipo($id)
	{
		$this->db->where('idequipo', $id);
		
		return $this->db->delete('equipo');
	}

}

/* End of file equipos_modelo.php */
/* Location: ./application/models/equipos_modelo.php */
?>