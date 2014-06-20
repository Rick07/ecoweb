<div id="datosTabla" style="width: 1200px;"></div>
<!-- Button trigger modal -->
<button class="btn btn-primary btn-info" data-toggle="modal" data-target="#nuevo">Nuevo</button>
<?php date_default_timezone_set("America/Mexico_City"); ?> 
<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Registro de Datos</h4>
      </div>
      <div class="modal-body">
        <?php echo validation_errors(); 
         $atr = array('id' => 'nuevosDat', 'autocomplete' => 'off'); 
        echo form_open('datos/newData', $atr); ?>
        <!--<input type="hidden" name="fecha" value="<?php //echo date('Y-m-d');?>">-->
        <!--<input type="hidden" name="hora" value="<?php //echo date('H:i:s'); ?> ">-->
        <div class="form-group">
            <label for="hour">Fecha</label>
            <input id="hour" type="date"  name="fecha"  class="form-control" required>
            </div>
          <div class="form-group">
            <label for="time">Hora</label>
            <input id="time" type="time"  name="hora"  class="form-control" required>
          </div>
          <div class="form-group">
            <label for="energiadia">Energía generada al día (KWh)</label>
            <input type="number" step="0.01"  min="0" id="energiadia" name="energiadia" class="form-control" placeholder="Ingrese la energía generada al día" required>
          </div>
          <div class="form-group">
           <label for="tiempodiario">Tiempo de generación diaria (Horas:minutos)</label>
            <input type="text" id="tiempodiario" name="tiempodiario" class="form-control" required pattern="([0-1]{1}[0-9]{1}|20|21|22|23):[0-5]{1}[0-9]{1}" />
          </div>
          <div class="form-group">
            <label for="energiatotal">Energía total (KWh)</label>
            <input type="number" min="0" id="energiatotal" name="energiatotal" class="form-control" placeholder="Ingrese la energía total generada" required>
          </div>
          <div class="form-group">
            <label for="energiatotal">Tiempo total (Hrs)</label>
            <input type="number" min="0" step="0.01" id="tiempototal" name="tiempototal" class="form-control" placeholder="Ingrese la energía total generada" required>
          </div>
           <div class="form-group">
            <label for="instalacion">Instalación</label>
            <select class="form-control" id="instalacion" required>
                <option value="">Seleccione una de sus instalaciones:</option>
                <?php foreach ($instalacion as $datos): ?>
                <option value="<?php echo $datos['idinstalacion'] ?>"><?php echo $datos['nombreinstalacion']?></option> 
                <?php endforeach ?>
            </select>
          </div>
          <div id="equi" class="form-group">
          </div>
          <div class="modal-footer">
            <button id="cerrar" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
            title: 'Datos generados',
            paging: true,
            pageSize: 5,
            sorting: true,
            multiSorting: true,
            defaultSorting: 'iddato ASC',
            messages: {
            noDataAvailable: 'No hay informacion disponible',
            areYouSure: '¿Estas seguro?',
            deleteConfirmation: 'Este registro sera borrrado. ¿Está seguro?',
            save: 'Guardar',
            saving: 'Guardando',
            cancel: 'Cancelar',
            deleteText: 'Borrar',
            deleting: 'Borrando',
            error: 'Error',
            close: 'Cerrar',
            pagingInfo: 'Mostrando {0}-{1} de {2} registros',
            pageSizeChangeLabel: 'Numero de filas en la tabla',
            gotoPageLabel: 'Ir a la pagina:',
            canNotDeletedRecords: 'No se pueden borrar {0} de {1} registros',
            deleteProggress: 'Borrados {0} de {1} registros, procesando...'
            },
            actions: {
                listAction: base_url+'index.php/datos/listarDatos',
                deleteAction: base_url+'index.php/datos/borrarDato'
            },
            fields: {
                iddato: {
                    title: 'ID',
                    key: true,
                    width: '3%'
                },
                fecha: {
                    title: 'Fecha',
                    width: '3%'
                },
                hora: {
                    title: 'Hora',
                    width: '20%'
                },
                energiageneradadia: {
                    title: 'Energía generada al día (KWh)',
                    width: '35%'
                },
                tiempogeneraciondiaria: {
                    title: 'Tiempo de generación diaria (Hrs:Seg)',
                    width: '35%'
                },
                energiatotal: {
                    title: 'Energía total (KWh)',
                    width: '25%'   
                },
                 tiempototal: {
                    title: 'Tiempo total (Hrs)',
                    width: '35%'   
                },
                serie: {
                    title: 'Equipo',
                    width: '20%'   
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
                $("#nuevosDat")[0].reset();
            }
        })        
        return false;
    }); 
});  
</script>
<script type="text/javascript">
$(document).ready(function(){ 
   $("#instalacion").change(function(evento){
    var inst = $('#instalacion').val();
      evento.preventDefault();
      $("#equi").load("equipos/listarEquiposIdInstalacion", {instalacion: inst});
   });
});
</script>