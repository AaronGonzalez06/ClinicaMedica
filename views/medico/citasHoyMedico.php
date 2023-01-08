<main>
        <div id="barraNav">
        <div class="datosTrabajador">
            <p><?=$_SESSION['session']->nombre;?></p>
            <p><?=$_SESSION['session']->DNI;?></p>
        </div>
        <div class="navegacion">
            <button><a href="<?= base_url?>Medico/misDatos">Mis datos</a></button>
            <button><a href="<?= base_url?>Medico/citasHoy">Citas hoy</a></button>
            <button><a href="<?= base_url?>Medico/citasProximas">Proximas citas</a></button>
            <button><a href="<?= base_url?>Medico/historial">Historial</a></button>
            <button><a href="<?= base_url?>Medico/paciente">pacientes</a></button>
            <button><a href="<?= base_url?>Login/session">Cerrar sesión</a></button>
        </div>
        </div>
        <h2>Citas para hoy</h2>
        <div id="citasHoy">
            
            <table id="tablaCitas" border=1>
            <tr>
                <th>Hora</th>
                <th>DNI</th>
                <th>Descripción</th>
                <th>Estado</th>
            </tr>
            <?php while ($res = $resultadoMedico->fetch_object()): ?>
                <tr>
                <td><?= $res->hora ?></td>
                <td><a href="<?= base_url?>Medico/datosPaciente&DNI=<?=$res->DNIpaciente?>"><?= $res->DNIpaciente ?></a></td>
                <td><?= $res->descripcionbreve ?></td>
                <td><?= $res->estado ?></td>
                <tr>
            <?php endwhile; ?>
        </table>

        <table id="tablaCitas" border=1>
            <tr>
                <th>Hora</th>
                <th>DNI</th>
                <th>Descripción</th>
                <th>Estado</th>
            </tr>
            <?php while ($res = $citasTerminadas->fetch_object()): ?>
                <tr>
                <td><?= $res->hora ?></td>
                <td><?= $res->DNIpaciente ?></td>
                <td><?= $res->descripcionbreve ?></td>
                <td><?= $res->estado ?></td>
                <tr>
            <?php endwhile; ?>
        </table>
        </div>
        <div id="citaPaciente">
            <div id="datosPaciente">
            <h3>Datos paciente</h3>

            <form method="post" action="<?= base_url?>Medico/updatePaciente">
            <p>DNI: <input type="text" name="DNI" value="<?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->DNI?> <?php endif;?>"></p>
            <p>Nombre: <input type="text" name="nombre" value="<?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->nombre?> <?php endif;?>"></p>
            <p>Apellido: <input type="text" name="apellido" value="<?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->apellido?> <?php endif;?>"></p>
            <p>Direccion: <input type="text" name="direccion" value="<?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->direccion?> <?php endif;?>"></p>
            <p>Localidad: <input type="text" name="localidad" value="<?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->localidad?> <?php endif;?>"></p>
            <p>Telefono: <input type="text" name="telefono" value="<?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->telefono?> <?php endif;?>"></p>
            <p>
                <input type="submit" value="Actualizar">
                <input type="reset" value="Borrar">
            </p>
            </form>
            </div>

            <div id="citaActual">
            <h3>Cita de: <?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->DNI?> <?php endif;?></h3>
                <form method="post" action="<?= base_url?>Citas/consulta">
                <p>Descripción de la cita:</p>
                <textarea name="descripcion" cols="40" rows="5"></textarea>
                <p>Tratamiento:</p>
                <textarea name="tratamiento" cols="40" rows="5"></textarea>
                <p>
                <p>Estado:
                <select name="estado">
                    <option>Terminada</option>
                </select>
                <input type="hidden" name="DNI" value="<?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->DNI?> <?php endif;?>">
                </p>
                    <input type="submit" value="Actualizar">
                    <input type="reset" value="Borrar">
                </p>
            </form>                
            </div>
        </div>
    </main>