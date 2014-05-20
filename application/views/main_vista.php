<!DOCTYPE html>
<html>
  <head>
    <title>ECOWEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="<?php echo base_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url()?>css/ui-lightness/jquery-ui-1.10.4.css" rel="stylesheet">
    <!-- Jquery -->
    <script src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>
    <script src="<?php echo base_url()?>js/jquery-ui-1.10.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/navtabs.js"></script>
    <!-- Include one of jTable styles. -->
<link href="<?php echo base_url()?>js/jtable/themes/lightcolor/red/jtable.min.css" rel="stylesheet" type="text/css" />
 
<!-- Include jTable script file. -->
<script src="<?php echo base_url()?>js/jtable/jquery.jtable.js" type="text/javascript"></script>
     <!-- Bootstrap -->
    <script src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
    <p><?php echo $id.' '.$nombre?><a href="<?php echo base_url()?>main/salir">Cerrar sesion</a></p>
     <img src="<?php echo base_url();?>images/logotipo.png" alt="logotipo" height="85" width="254">
   <!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active" id="instalaciones"><a href="#instalaciones" data-toggle="tab">Instalaciones</a></li>
  <li id="equipos"><a href="#equipos" data-toggle="tab">Equipos</a></li>
  <li id="tablero"><a href="#tablero" data-toggle="tab">Tablero de datos</a></li>
</ul>
<div id="seccion"></div>
</body>
</html>