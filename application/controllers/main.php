<?php

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
        /*$this->load->library('session');
        $nombre = $this->session->userdata('nombre');
        if(!($nombre))
        {
        	header("Location: http://localhost/ecodata");
        }*/
	}

	public function index()
	{
		$this->load->helper(array('form', 'url', 'html'));
		//$data['nombre'] = $this->session->userdata('nombre');
		$this->load->view('ingresaExcelVista');
	}

	//Importar desde Excel con libreria de PHPExcel
    public function importarExcel(){
    	//Cargar PHPExcel library
        $this->load->library('Excel');
 
    	$name   = $_FILES['file']['name'];
     	$tname  = $_FILES['file']['tmp_name'];
 
        $obj_excel = PHPExcel_IOFactory::load($tname);       
       	$sheetData = $obj_excel->getActiveSheet()->toArray(null,true,true,true);
 
       	$arr_datos = array();
       	foreach ($sheetData as $index => $value) {            
            if ( $index != 1 ){
                $arr_datos = array(
                    'campo'  => $value['A'],
                    'campo1'  =>  $value['B'],
                    'campo2' =>  $value['C'],
                    'campo3'  =>  $value['D'],                                        
                ); 
		foreach ($arr_datos as $llave => $valor) {
			$arr_datos[$llave] = $valor;
		}
		$this->db->insert('example_table',$arr_datos);	
            } 
       	}
       	$result['valid'] = true;
	$result['message'] = 'Productos importados correctamente';
 
	$this->output
    	     ->set_content_type('application/json')
    	     ->set_output(json_encode($result)); 		
    }

}

/* End of file main.php */
/* Location: ./application/views/main.php */
?>