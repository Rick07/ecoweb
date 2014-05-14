<?php 

class Plots_modelo extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	function get_data()
    {
		$query = $this->db->get('datos');
       	return $query->result();
    }

}

/* End of file plots_modelo.php */
/* Location: ./application/models/plots_modelo.php */
?>