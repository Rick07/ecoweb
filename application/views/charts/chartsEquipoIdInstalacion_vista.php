<label  for="equipo">Equipo</label>
            <select  id="equipo" name="equipo" required>
                <option value="">Seleccione el equipo al que pertenecen los datos generados:</option>
                <?php foreach ($equipo as $datos): ?>
                <option value="<?php echo $datos['idequipo'] ?>"><?php echo $datos['modelo']?></option> 
                <?php endforeach ?>
            </select>