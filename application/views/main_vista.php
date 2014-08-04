<!DOCTYPE html>
<html>
  <head>
    <title>ECOWEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="<?php echo base_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url()?>css/blitzer/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <!-- Jquery -->
    <script src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>
    <script src="<?php echo base_url()?>js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/navtabs.js"></script>
    <!-- Include one of jTable styles. -->
    <link href="<?php echo base_url()?>js/jtable/themes/lightcolor/blue/jtable.min.css" rel="stylesheet" type="text/css" />
    <!-- Include jTable script file. -->
    <script src="<?php echo base_url()?>js/jtable/jquery.jtable.js" type="text/javascript"></script>
     <!-- Bootstrap -->
    <script src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
    <!-- Mostrar tabla al inicio -->
    <script type="text/javascript">
      $(document).ready(function () {
          $('#instalaciones').click();
      });
    </script>
  </head>
  <body>
    <div class="col-md-3 col-md-offset-9">
        <ul class="nav nav-pills nav-stacked">
          <li class="active">
            <a href="<?php echo base_url()?>index.php/main/salir">
              <span class="badge pull-right">Cerrar Sesión</span>
              <?php echo $nombre?>
            </a>
          </li>
         </ul>
    </div>
     <img src="<?php echo base_url();?>images/logotipo.png" alt="logotipo" height="85" width="254">
   <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="active" id="instalaciones"><a href="#instalaciones" data-toggle="tab">Instalaciones</a></li>
    <li id="equipos"><a href="#equipos" data-toggle="tab">Equipos</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ingreso de datos <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li id="datosmanuales"><a href="#" data-toggle="tab">Ingreso manual</a></li>
        <li id="datosimportados"><a href="#" data-toggle="tab">Importar de archivo excel</a></li>
      </ul>
    </li>
    <li id="tablero"><a href="#tablero" data-toggle="tab">Tablero de datos</a></li>
  </ul>
<div id="seccion"></div>
</body>
</html> 