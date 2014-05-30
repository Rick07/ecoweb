        <button id="target1" class="btn btn-success">MOSTRAR GRÁFICA</button>
            <label  for="equipo">Equipo</label>
            <select  id="equipo" name="equipo" required>
                <option value="">Seleccione el equipo al que pertenecen los datos generados:</option>
                <?php foreach ($equipo as $datos): ?>
                <option value="<?php echo $datos['idequipo'] ?>"><?php echo $datos['modelo']?></option> 
                <?php endforeach ?>
            </select>
            <label  for="filtro">Filtro</label>
            <select  id="filtro" name="filtro" required>
                <option value="">Ver grafica por:</option>
                <option value="Semana">Semana</option>
                <option value="Mes">Mes</option>
                <option value="Year">Año</option> 
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
