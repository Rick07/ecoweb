		<?php  $attrib = array('id' => 'formDatEx', 'name' => 'formDatEx' ); //echo br(3)?>
        <?=form_open_multipart('datos/importarDatosExcel', $attrib)?>
        <input type="file" name="file"  required>
        <input type="submit" name="submit" id="Upload" value="Upload" class="btn btn-primary">
        <?=form_close()?>
        

