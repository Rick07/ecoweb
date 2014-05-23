<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instalaciones_modelo extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function listarInstalacionesIdDist()
	{
		//$query = $this->db->where('distribuidorid', $id);
		$query = $this->db->get('instalacion');
		return $query->result_array();
	}

	public function nuevaInstalacion()
	{
		$data = array('tiposistema' => $this->input->post('tipoSistema'),
			'categoria' => $this->input->post('tipoCategoria'),
			'tipocompra' => $this->input->post('tipoCompra'),
			'direccion' => $this->input->post('direccion'),
			'nombre' => $this->input->post('nombreInstalacion'),
			'codigoestado' => $this->input->post('zona'),
			'distribuidorid' => $this->input->post('idDistribuidor'));

		return $this->db->insert('instalacion', $data);
	}	

}

/* End of file instalaciones_modelo.php */
/* Location: ./application/models/instalaciones_modelo.php */
?>