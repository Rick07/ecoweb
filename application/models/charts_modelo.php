<?php 

class Charts_modelo extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	function getDataWeek($id)
    {
        $query = $this->db->where('distribuidorid', $id);
        //$query = $this->db->where('equipoid', $equipo);
        $query = $this->db->join('equipo', 'datos.equipoid = equipo.idequipo');
        $query = $this->db->join('instalacion', 'equipo.instalacionid = instalacion.idinstalacion');
        $query = $this->db->join('distribuidor', 'instalacion.distribuidorid = distribuidor.iddistribuidor');
		$query = $this->db->get('datos');
       	$data = $query->result();

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

        return $result;
    }

    function getDataDay($id, $fecha)
    {
        $query = $this->db->select("DATE_FORMAT(hora, ('%H:%i %p')) AS hora, energiageneradadia, fecha");
        $query = $this->db->where('fecha', $fecha);
        $query = $this->db->where('distribuidorid', $id);
        $query = $this->db->join('equipo', 'datos.equipoid = equipo.idequipo');
        $query = $this->db->join('instalacion', 'equipo.instalacionid = instalacion.idinstalacion');
        $query = $this->db->join('distribuidor', 'instalacion.distribuidorid = distribuidor.iddistribuidor');
        $query = $this->db->get('datos');
        $data = $query->result();

        $category = array();
        $category['name'] = 'Hora';
        
        $series1 = array();
        $series1['name'] = 'Energia generada por hora';
        
        foreach ($data as $row)
        {
            $category['data'][] = $row->hora;
            $series1['data'][] = $row->energiageneradadia;
        }
        
        $result = array();
        array_push($result,$category);
        array_push($result,$series1);

        return $result;
    }

}

/* End of file plots_modelo.php */
/* Location: ./application/models/plots_modelo.php */
?>