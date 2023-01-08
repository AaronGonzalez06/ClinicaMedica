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
        <h2>Proximas citas.</h2>
        <div id="proximasCitas">
        <div class="buscadorFormulario">
        <form method="post" action="<?= base_url?>Medico/proximasCitasBuscador">
            <p>Buscar DNI:<input type="text" name="DNI"></p>
            <p>
                <input type="submit" value="Buscar">
            </p>
        </form>
        </div>
        <table id="tablaHoy" border=1>
            <tr>
                <th>Día</th>
                <th>Hora</th>
                <th>DNI</th>
                <th>Descripción</th>
            </tr>
            <?php while ($res = $resultadoCitas->fetch_object()): ?>
                <tr>
                <td><?= $res->dia ?></td>
                <td><?= $res->hora ?></td>
                <td><?= $res->DNIpaciente ?></td>
                <td><?= $res->descripcionbreve ?></td>
                <tr>
            <?php endwhile; ?>
        </table>
            
        </div>
    </main>