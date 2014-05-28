<?php

class Datos_modelo extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function listarDatosIdDist($id, $jtSorting, $jtStartIndex, $jtPageSize)
	{
		$sql="SELECT
				datos.iddato AS iddato,
				DATE_FORMAT(datos.fecha, '%d/%m/%Y') AS fecha,
				DATE_FORMAT(datos.hora, '%h:%i %p') AS hora,
				datos.energiageneradadia AS energiageneradadia,
				DATE_FORMAT(datos.tiempogeneraciondiaria, '%h:%i') AS tiempogeneraciondiaria,
				datos.energiatotal AS energiatotal,
				datos.tiempototal AS tiempototal,
				equipo.serie AS serie
				FROM
				datos
				INNER JOIN equipo ON datos.equipoid = equipo.idequipo
				INNER JOIN instalacion ON equipo.instalacionid = instalacion.idinstalacion
				INNER JOIN distribuidor ON instalacion.distribuidorid = distribuidor.iddistribuidor
				WHERE
				instalacion.distribuidorid = $id
				ORDER BY
				$jtSorting
				LIMIT $jtStartIndex, $jtPageSize";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function totalDatosIdDist($id)
	{
		$sql = "SELECT
				Count(datos.iddato) AS record
				FROM
				datos
				INNER JOIN equipo ON datos.equipoid = equipo.idequipo
				INNER JOIN instalacion ON equipo.instalacionid = instalacion.idinstalacion
				INNER JOIN distribuidor ON instalacion.distribuidorid = distribuidor.iddistribuidor
				WHERE
				instalacion.distribuidorid = $id";
		$query = $this->db->query($sql);

		return  $query->result_array();
	}

	public function newData()
	{
		$data = array('fecha' => $this->input->post('fecha'),
			'hora' => $this->input->post('hora'),
			'energiageneradadia' => $this->input->post('energiadia'),
			'tiempogeneraciondiaria' => $this->input->post('tiempodiario'),
			'energiatotal' => $this->input->post('energiatotal'),
			'tiempototal' => $this->input->post('tiempototal'),
			'equipoid' => $this->input->post('equipo'));

		return $this->db->insert('datos', $data);
	}

	public function borrarDato($id)
	{
		$this->db->where('iddato', $id);
		
		return $this->db->delete('datos');
	}

}

/* End of file data_modelo.php */
/* Location: ./application/models/data_modelo.php */
?>