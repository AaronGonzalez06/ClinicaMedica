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
        <div id="todoDatos">
        <div class="misDatos">
            <form method="post" action="">
                <fieldset>
                <legend>Datos personales</legend>
                <p>Dirección: <input type="text" name="usuario" value="<?=$_SESSION['session']->direccion;?>"></p>
                <p>Localidad: <input type="text" name="localidad" value="<?=$_SESSION['session']->localidad;?>"></p>
                <p>Teléfono: <input type="text" name="telefono" value="<?=$_SESSION['session']->telefono;?>"></p>
                <p class="botones"><input type="submit" value="Actualizar"><input type="reset" value="Limpiar"></p>
                </fieldset>
            </form>
        </div>
        <div class="contrasena">
            <form method="post" action="">
                <fieldset>
                <legend>Nueva contraseña</legend>
                <p>Nueva contraseña: <input type="text" name="localidad"></p>
                <p>Repetir contraseña: <input type="text" name="telefono"></p>
                <p class="botones"><input type="submit" value="Actualizar"><input type="reset" value="Limpiar"></p>
                </fieldset>
            </form>
        </div>
        </div>
    </main>