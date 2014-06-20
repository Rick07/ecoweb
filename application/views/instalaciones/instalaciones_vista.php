<div id="instalacionTabla" style="width: 700px;"></div>
<!-- Button trigger modal -->
<button class="btn btn-primary btn-info" data-toggle="modal" data-target="#nuevaInst">Nueva</button>

<!-- Modal -->
<div class="modal fade" id="nuevaInst" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Registro de nueva instalación</h4>
      </div>
      <div class="modal-body">
        <?php echo validation_errors(); 
         $atr = array('id' => 'nuevaInstalacion', 'autocomplete' => 'off'); 
        echo form_open('instalaciones/nuevaInstalacion', $atr); ?>
            <input type="hidden" name="idDistribuidor" value="<?php echo $id?>">
          <div class="form-group">
            <label for="tipoSistema">Tipo de sistema</label>
            <select class="form-control" id="tipoSistema" name="tipoSistema" required>
                <option value="">Seleccione el tipo de sistema:</option>
                <option>PV00</option>
                <option>PV0</option>
                <option>PV1</option>
                <option>PV2</option>
                <option>PV3</option>
                <option>PV4</option>
                <option>PV5</option>
                <option>PV6</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tipoCategoria">Categoría</label>
             <select class="form-control" id="tipoCategoria" name="tipoCategoria" required>
                <option>Seleccione la categoría del sistema:</option>
                <option>Bifásico</option>
                <option>Trifásico</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tipoCompra">Tipo de compra</label>
            <select class="form-control" id="tipoCompra" name="tipoCompra" required>
                <option>Seleccione el tipo de compra:</option>
                <option>Arrendamiento</option>
                <option>Directa</option>
            </select>
          </div>
          <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Escriba su dirección" required>
          </div>
          <div class="form-group">
            <label for="nombreInstalacion">Nombre</label>
            <input type="text" id="nombreInstalacion" name="nombreInstalacion" class="form-control" placeholder="Escriba el nombre de la instalación" >
          </div>
           <div class="form-group">
            <label for="zona">Zona</label>
            <select class="form-control" id="zona" name="zona" required>
                <option value="">Seleccione la zona en la que esta ubicada la instalación:</option>
                <?php foreach ($state as $datos): ?>
                <option value="<?php echo $datos['sCode'] ?>"><?php echo $datos['sName']?></option> 
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
        $('#instalacionTabla').jtable({
            title: 'Instalaciones',
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
                listAction: base_url+'index.php/instalaciones/listarInstalaciones',
                deleteAction: base_url+'index.php/instalaciones/borrarInstalacion'
            },
            fields: {
                idinstalacion: {
                    title: 'ID',
                    key: true,
                    width: '10%'
                },
                tiposistema: {
                    title: 'Tipo de sistema',
                    width: '30%'
                },
                categoria: {
                    title: 'Categoria',
                    width: '20%'
                },
                tipocompra: {
                    title: 'Tipo de compra',
                    width: '20%'
                },
                direccion: {
                    title: 'Direccion',
                    width: '70%'
                },
                nombreinstalacion: {
                    title: 'Nombre',
                    width: '50%'   
                },
                sName: {
                    title: 'Zona',
                    width: '50%'
                }
            }
        });
          $('#instalacionTabla').jtable('load');
    });
</script>
<script language="javascript">
$(document).ready(function() {
   // Interceptamos el evento submit
    $('#nuevaInstalacion').submit(function() {
  // Enviamos el formulario usando AJAX
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                alert("DATOS REGISTRADOS");
                $("#nuevaInstalacion")[0].reset();
            }
        })        
        return false;
    }); 
})  
</script>