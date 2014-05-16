<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $nombre = $this->session->userdata('nombre');
        $this->load->helper(array('form', 'url', 'html'));
        if(!($nombre))
        {
           redirect('login');
        }
    }

	public function index()
	{
        $data['id'] = $this->session->userdata('id');
        $data['nombre'] = $this->session->userdata('nombre');
        $this->load->view('ingresaExcelVista', $data);
	}

	public function importarDatosExcel(){
    	//Cargar PHPExcel library
        $this->load->library('Excel');
 
    	$name   = $_FILES['file']['name'];
     	$tname  = $_FILES['file']['tmp_name'];
     	$idequipo = 1;
 
        $obj_excel = PHPExcel_IOFactory::load($tname);       
       	$sheetData = $obj_excel->getActiveSheet()->toArray(true,true,true,true,true,true);
 
       	$arr_datos = array();
       	foreach ($sheetData as $index => $value) {            
            if ( $index != 1 ){
                $arr_datos = array(
                    'fecha'  =>  (string)$value['A'],
                    'hora' =>  (string)$value['B'],
                    'energiageneradadia'  =>  (double)$value['C'],                                        
                    'tiempogeneraciondiaria'  =>  (string)$value['D'],
                    'energiatotal'  =>  (int)$value['E'],
                    'tiempototal'  =>  (double)$value['F'],
                    'equipoid'  =>  $idequipo,
                ); 
		foreach ($arr_datos as $llave => $valor) {
			$arr_datos[$llave] = $valor;
		}
		$this->db->insert('datos',$arr_datos);	
            } 
       	}
       	$result['valid'] = true;
	$result['message'] = 'Productos importados correctamente';
 
	$this->output
    	     ->set_content_type('application/json')
    	     ->set_output(json_encode($result)); 		
    }

    public function data()
    {
        $this->load->model('plots_modelo');
        $data = $this->plots_modelo->get_data();
        
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
        
        print json_encode($result, JSON_NUMERIC_CHECK);


    }

}

/* End of file datos.php */
/* Location: ./application/controllers/datos.php */
?>