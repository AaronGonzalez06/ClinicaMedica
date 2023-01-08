<main>
        <div id="barraNav">
        <div class="datosTrabajador">
            <p><?=$_SESSION['session']->nombre;?></p>
            <p><?=$_SESSION['session']->DNI;?></p>
        </div>
        <div class="navegacion">
            <button><a href="<?= base_url?>Empleado/misDatos">Mis datos</a></button>
            <button><a href="<?= base_url?>Empleado/citasHoy">Citas hoy</a></button>
            <button><a href="<?= base_url?>Empleado/citasProximas">Proximas citas</a></button>
            <button><a href="<?= base_url?>Empleado/nuevaCita">Nueva cita</a></button>
            <button><a href="<?= base_url?>Login/session">Cerrar sesión</a></button>
        </div>
        </div>

        <h2>Citas para hoy: <?php $fechaActual = date('d-m-Y'); echo $fechaActual;?>.</h2>
        <div id="citasHoy">
        <table id="tablaHoy" border=1>
            <tr>
                <th>Hora</th>
                <th>DNI</th>
                <th>Descripción</th>
                <th>Médico</th>
            </tr>
            <?php while ($res = $resultadoCitas->fetch_object()): ?>
                <tr>
                <td><?= $res->hora ?></td>
                <td><?= $res->DNIpaciente ?></td>
                <td><?= $res->descripcionbreve ?></td>
                <td><?= $res->DNImedico ?></td>
                <tr>
            <?php endwhile; ?>
        </table>
            
        </div>
    </main>