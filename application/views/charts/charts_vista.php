        <button id="target1" class="btn btn-success">MOSTRAR GRÁFICA</button>
            <label for="instalacion">Instalación</label>
            <select  id="instalacion" required>
                <option value="">Seleccione una de sus instalaciones:</option>
                <?php foreach ($instalacion as $datos): ?>
                <option value="<?php echo $datos['idinstalacion'] ?>"><?php echo $datos['nombreinstalacion']?></option> 
                <?php endforeach ?>
            </select>
            <div id="equi"></div>
        <button id="target2" class="btn btn-success">MOSTRAR GRÁFICA</button>
        <label for="date">Eliga una fecha</label> 
        <input type="date" id="fecha" name="fecha" >
        <div class="row">
        <div id="container" class="col-md-6" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
        <div id="container2" class="col-md-6" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
        </div>
        <script type="text/javascript" src="<?php echo base_url()?>js/plotenergy.js"></script>
        <script src="<?php echo base_url()?>js/highcharts.js"></script>
        <script src="<?php echo base_url()?>js/modules/exporting.js"></script>
        <script type="text/javascript">
$(document).ready(function(){ 
   $("#instalacion").change(function(evento){
    var inst = $('#instalacion').val();
      evento.preventDefault();
      $("#equi").load("equipos/listarEquiposIdInstalacion", {instalacion: inst});
   });
});
</script>
    
