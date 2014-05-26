<div id="datosTabla" style="width: 700px;"></div>
<!-- Button trigger modal -->
<button class="btn btn-primary btn-info" data-toggle="modal" data-target="#nuevo">Nuevo</button>
<?php date_default_timezone_set("America/Mexico_City"); ?> 
<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Registro de nuevo Equipo</h4>
      </div>
      <div class="modal-body">
        <?php echo validation_errors(); 
         $atr = array('id' => 'nuevosDat', 'autocomplete' => 'off'); 
        echo form_open('datos/nuevosDatos', $atr); ?>
        <input type="hidden" name="fecha" value="<?php echo date('Y-m-d'); ?>">
        <input type="hidden" name="hora" value="<?php echo date("h:i:s A"); ?>">
         <div class="form-group">
            <label for="fechahora">Fecha y Hora</label>
            <input type="text"  id="fechahora" value="<?php echo date('d-m-Y - h:i:s A'); ?>" class="form-control" placeholder="Ingrese la energía generada al día" required>
          </div>
          <div class="form-group">
            <label for="energiadia">Energía generada al día (KWh)</label>
            <input type="number" step="0.01"  min="0" id="energiadia" name="energiadia" class="form-control" placeholder="Ingrese la energía generada al día" required>
          </div>
          <div class="form-group">
            <label for="tiempodiario"> <span>Tiempo de generación diaria</span></label>
            <input type="time" id="tiempodiario"  name="tiempodiario" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="energiatotal">Energía total (KWh)</label>
            <input type="number" min="0" id="energiatotal" name="energiatotal" class="form-control" placeholder="Ingrese la energía total generada" required>
          </div>
          <div class="form-group">
            <label for="energiatotal">Tiempo total (Hrs)</label>
            <input type="number" min="0" step="0.01" id="energiatotal" name="energiatotal" class="form-control" placeholder="Ingrese la energía total generada" required>
          </div>
           <div class="form-group">
            <label for="instalacion">Instalación</label>
            <select class="form-control" id="instalacion" name="instalacion" required>
                <option value="">Seleccione la Instalación a la que pertenece el equipo:</option>
                <?php foreach ($instalacion as $datos): ?>
                <option value="<?php echo $datos['idinstalacion'] ?>"><?php echo $datos['nombreinstalacion']?></option> 
                <?php endforeach ?>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Guardar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

 <script type="text/javascript">
    $(document).ready(function () {
      var base_url = "<?=base_url()?>"; 
        $('#datosTabla').jtable({
            title: 'Equipo',
            actions: {
                listAction: base_url+'equipos/listarEquipos',
                deleteAction: base_url+'equipos/borrarEquipo'
            },
            fields: {
                idequipo: {
                    title: 'ID',
                    key: true,
                    width: '10%'
                },
                tipo: {
                    title: 'Tipo de equipo',
                    width: '20%'
                },
                numeroparte: {
                    title: 'Número de parte',
                    width: '20%'
                },
                serie: {
                    title: 'Serie',
                    width: '12%'
                },
                modelo: {
                    title: 'Modelo',
                    width: '12%'
                },
                nombreinstalacion: {
                    title: 'Instalación',
                    width: '75%'   
                }
            }
        });
          $('#datosTabla').jtable('load');
    });
</script>
<script language="javascript">
$(document).ready(function() {
   // Interceptamos el evento submit
    $('#nuevosDat').submit(function() {
  // Enviamos el formulario usando AJAX
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                alert("DATOS REGISTRADOS");
            }
        })        
        return false;
    }); 
})  
</script>