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
        <h2>Historial pacientes.</h2>
        <div id="historialPacienteMedico">
            <div id="misPacientes">
                <ul>
                <?php while ($res = $pacientes->fetch_object()): ?>
                    <li><a href="<?= base_url?>Medico/datosPacienteYCitas&DNI=<?=$res->DNIpaciente?>"><?= $res->DNIpaciente ?></a></li>
            <?php endwhile; ?>
                </ul>
            </div>
            <div id="datosLista">
            <?php if(isset($resultadoDatos)):?> 
            <ul>
                <li>DNI: <?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->DNI?> <?php endif;?>.</li>
                <li>Nombre: <?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->nombre?> <?php endif;?>.</li>
                <li>Apellido: <?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->apellido?> <?php endif;?>.</li>
                <li>Dirección: <?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->direccion?> <?php endif;?>.</li>
                <li>Localidad: <?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->localidad?> <?php endif;?>.</li>
                <li>Teléfono: <?php if(isset($resultadoDatos)):?> <?=$resultadoDatos->telefono?> <?php endif;?>.</li>
            </ul>
            <?php endif;?>
            </div>
            <div id="datosCosultaPaciente">
                <?php if(isset($resultadoDatosConsultas)):?>
            <?php while ($res = $resultadoDatosConsultas->fetch_object()): ?>
                <ul>
                <li><strong>Fecha:</strong> <?=$res->dia?> .</li>
                <li><strong>Hora:</strong> <?=$res->hora?> .</li>
                <li><strong>Descripcion breve:</strong> <?=$res->descripcionbreve?> .</li>
                <li<strong>Descripcion cita:</strong> <?=$res->descripcionCita?> .</li>
                <li><strong>Tratamiento:</strong> <?=$res->tratamiento?> .</li>
                </ul>
                <hr/>
            <?php endwhile; ?>
            <?php endif;?>
            </div>      
        </div>
    </main>