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
        <div id="nuevaCita">
        <h2>Nueva cita:</h2>
        <form method="post" action="<?= base_url?>Citas/newCita" id="formularioCitaNueva">
            <p>DNI: <input type="text" name="DNI"></p>
            <p>
                Día:
            <select name="dia">
                <?php
                 $fecha_actual = date("d-m-Y");
                 for($x=0;$x<20;$x++):?>
                    <option><?=date("Y-m-d",strtotime($fecha_actual."+ ".$x." days"));?></option>
                <?php endfor;?>
                </select>
                
                Hora:
                <select name="hora">
                    <option>10:00</option>
                    <option>10:30</option>
                    <option>11:00</option>
                    <option>11:30</option>
                    <option>12:00</option>
                    <option>12:30</option>
                    <option>13:00</option>
                    <option>13:30</option>
                    <option>16:00</option>
                    <option>16:30</option>
                    <option>17:00</option>
                    <option>17:30</option>
                    <option>18:00</option>
                    <option>18:30</option>
                    <option>19:00</option>
                    <option>19:30</option>
                    <option>20:00</option>
                    <option>20:30</option>
                </select></p>
            <p>Descripción: <input type="text" name="descripcion" size="40"></p>
            <p>Médico:
                <select name="medico">
                <?php while ($res = $resultadoMedico->fetch_object()): ?>
                    <option value='<?=$res->DNI;?>'><?=$res->DNI;?> - <?=$res->nombre;?></option>
                <?php endwhile;?>
                </select></p>
            <p>
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">
            </p>
        </form>
        <h3><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];}?></h3>
        </div>
</main>