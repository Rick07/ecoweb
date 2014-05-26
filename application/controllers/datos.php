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
        $this->load->view('datos/ingresaExcelVista');
    }

    public function nuevosDatos()
    {
        # code...
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