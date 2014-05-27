 <label for="equipo">Equipos</label>
            <select class="form-control" id="equipo" name="equipo" required>
                <option value="">Seleccione el equipo:</option>
                <?php foreach ($equipo as $datos): ?>
                <option value="<?php echo $datos['idequipo'] ?>"><?php echo $datos['modelo']?></option> 
                <?php endforeach ?>
            </select>