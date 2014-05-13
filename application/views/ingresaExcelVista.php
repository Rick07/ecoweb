<!DOCTYPE html>
<html>
    <head>
            <title></title>
    </head>
    <body>
    	<p><?php //echo $nombre;?></p>
    	<?php //echo br(3)?>
        <?=form_open_multipart('main/importarExcel')?>
        <?=form_upload('file')?>
        <?=form_submit('submit', 'Upload')?>
        <?=form_close()?>
    </body>
</html>

