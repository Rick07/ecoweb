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
        $this->load->model('instalaciones_modelo');
    }

	public function index()
	{
        $id = $this->session->userdata('id');
        $data['instalacion'] = $this->instalaciones_modelo->listarInstalacionesIdDist($id);
        $this->load->view('datos/datos_vista', $data);
	}

    public function excelVista()
    {
        $id = $this->session->userdata('id');
        $data['instalacion'] = $this->instalaciones_modelo->listarInstalacionesIdDist($id);
        $this->load->view('datos/ingresaExcelVista', $data);
    }

    public function listarDatos()
    {
        $id = $this->session->userdata('id');
        $this->load->model('datos_modelo');
        $recordCount = $this->datos_modelo->totalDatosIdDist($id);

        foreach ($recordCount as $key) {
            $record = $key['record'];
        }

        $jtSorting = $this->input->get('jtSorting', TRUE);
        $jtStartIndex = $this->input->get('jtStartIndex', TRUE);
        $jtPageSize = $this->input->get('jtPageSize', TRUE);
        
        $datos = $this->datos_modelo->listarDatosIdDist($id, $jtSorting, $jtStartIndex, $jtPageSize);

        $data = array();
        
        foreach($datos as $key)
                    {
                        $data[] = $key;
                    }

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $record;
        $jTableResult['Records'] = $data;
        print json_encode($jTableResult);

    }

    public function newData()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('energiadia', 'Energia generada al dia', 'trim|required');
        $this->form_validation->set_rules('tiempodiario', 'Tiempo de generacion diaria', 'trim|required');
        $this->form_validation->set_rules('energiatotal', 'Energia total', 'trim|required');
        $this->form_validation->set_rules('tiempototal', 'Tiempo total', 'trim|required');
        $this->form_validation->set_rules('equipo', 'Equipo', 'trim|required');
        if($this->form_validation->run() == FALSE)
            {
               exit();
            }
            else
            {
                $this->load->model('datos_modelo');
                $this->datos_modelo->newData();
            }
    }

    public function borrarDato()
    {
        $id = $this->input->post('iddato');
        $this->load->model('datos_modelo');
        $this->datos_modelo->borrarDato($id);

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        print json_encode($jTableResult);
    }

	public function importarDatosExcel(){
    	//Cargar PHPExcel library
        $this->load->library('Excel');
        $idequipo = $this->input->post('equipo');
 
    	$name   = $_FILES['file']['name'];
     	$tname  = $_FILES['file']['tmp_name'];
 
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
        $this->load->database();
		$this->db->insert('datos',$arr_datos);
        echo "<script language='JavaScript'>
             {
               alert('Datos importados correctamente');  
               setTimeout(location.href='http://localhost/ecoweb/main', 2000);}
                </script>";     	
            } 
       	}
       	
    }

}

/* End of file datos.php */
/* Location: ./application/controllers/datos.php */
?>