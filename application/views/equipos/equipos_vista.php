<div id="equipoTabla" style="width: 700px;"></div>
<!-- Button trigger modal -->
<button class="btn btn-primary btn-info" data-toggle="modal" data-target="#nuevo">Nuevo</button>

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
         $atr = array('id' => 'nuevoEquipo', 'autocomplete' => 'off'); 
        echo form_open('equipos/nuevoEquipo', $atr); ?>
          <div class="form-group">
            <label for="tipoEquipo">Tipo de equipo</label>
            <select class="form-control" id="tipoEquipo" name="tipoEquipo" required>
                <option value="">Seleccione el tipo de equipo:</option>
                <option>Inversor</option>
                <option>MicroInversor</option>
            </select>
          </div>
          <div class="form-group">
            <label for="numparte">Número de parte</label>
            <input type="number"  min="0" id="numparte" name="numeroParte" class="form-control" placeholder="Escriba el numero de parte" required>
          </div>
          <div class="form-group">
            <label for="serie"> <span>Serie</span></label>
            <input type="text" id="serie" name="serie" class="form-control" placeholder="Escriba el numero de serie" required>
          </div>
          <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Escriba el modelo" required>
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
        $('#equipoTabla').jtable({
            title: 'Equipo',
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
                listAction: base_url+'index.php/equipos/listarEquipos',
                deleteAction: base_url+'index.php/equipos/borrarEquipo'
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
          $('#equipoTabla').jtable('load');
    });
</script>
<script language="javascript">
$(document).ready(function() {
   // Interceptamos el evento submit
    $('#nuevoEquipo').submit(function() {
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