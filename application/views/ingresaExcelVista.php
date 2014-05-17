
    	<p><?php echo $id.' '.$nombre?></p>
        <a href="<?php echo base_url()?>">asS</a>
    	<?php //echo br(3)?>
        <?=form_open_multipart('main/importarExcel')?>
        <?=form_upload('file')?>
        <?=form_submit('submit', 'Upload')?>
        <?=form_close()?>
    </body>
</html>

