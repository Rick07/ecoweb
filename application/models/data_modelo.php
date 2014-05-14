<?php

class Data_modelo extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function get_data()
    {
	    $query = $this->db->get('datos');
	    return $query->result();
    }

}

/* End of file data_modelo.php */
/* Location: ./application/models/data_modelo.php */
?>