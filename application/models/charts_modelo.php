<?php 

class Charts_modelo extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	function get_data()
    {
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

}

/* End of file plots_modelo.php */
/* Location: ./application/models/plots_modelo.php */
?>