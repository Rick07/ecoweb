<?php 

class Charts_modelo extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

    public function getDataYear($id, $equipo)
    {
        $sql = "SELECT
                DATE_FORMAT(datos.fecha, '%Y') AS fecha,
                Sum(datos.energiageneradadia) AS energiageneradadia
                FROM
                datos
                INNER JOIN equipo ON datos.equipoid = equipo.idequipo
                INNER JOIN instalacion ON equipo.instalacionid = instalacion.idinstalacion
                INNER JOIN distribuidor ON instalacion.distribuidorid = distribuidor.iddistribuidor
                WHERE
                instalacion.distribuidorid = $id AND
                datos.equipoid = $equipo
                GROUP BY
                YEAR(fecha)";
        $query = $this->db->query($sql);
        $data = $query->result();

        $category = array();
        $category['name'] = 'Fecha';
        
        $series1 = array();
        $series1['name'] = 'Energia generada al Año';
        
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


    public function getDataMonth($id, $equipo)
    {
        $añoactual = date('Y');

        $sql = "SELECT
                DATE_FORMAT(datos.fecha, '%M') AS fecha,
                Sum(datos.energiageneradadia) AS energiageneradadia
                FROM
                datos
                INNER JOIN equipo ON datos.equipoid = equipo.idequipo
                INNER JOIN instalacion ON equipo.instalacionid = instalacion.idinstalacion
                INNER JOIN distribuidor ON instalacion.distribuidorid = distribuidor.iddistribuidor
                WHERE
                instalacion.distribuidorid = $id AND
                datos.equipoid = $equipo AND
                YEAR(fecha) = $añoactual
                GROUP BY
                MONTH(fecha)";
        $query = $this->db->query($sql);
        $data = $query->result();

        $category = array();
        $category['name'] = 'Fecha';
        
        $series1 = array();
        $series1['name'] = 'Energia generada al Mes';
        
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

	public function getDataWeek($id, $equipo)
    {
        $sql = "SELECT
                DATE_FORMAT(datos.fecha, '%d/%M/%Y') AS fecha,
                Sum(datos.energiageneradadia) AS energiageneradadia
                FROM
                datos
                INNER JOIN equipo ON datos.equipoid = equipo.idequipo
                INNER JOIN instalacion ON equipo.instalacionid = instalacion.idinstalacion
                INNER JOIN distribuidor ON instalacion.distribuidorid = distribuidor.iddistribuidor
                WHERE
                instalacion.distribuidorid = $id AND
                datos.equipoid = $equipo AND
                YEARweek(fecha) = YEARweek(CURRENT_date)
                GROUP BY
                datos.fecha";
        $query = $this->db->query($sql);
       	$data = $query->result();

       	$category = array();
        $category['name'] = 'Fecha';
        
        $series1 = array();
        $series1['name'] = 'Energia generada a la Semana';
        
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

    public function getDataDay($id, $equipo, $fecha)
    {
        $query = $this->db->select("DATE_FORMAT(hora, ('%h:%i %p')) AS hora, energiageneradadia, fecha");
        $query = $this->db->where('equipoid', $equipo);
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