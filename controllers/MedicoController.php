<?php
require_once 'models/Empleado.php';
require_once 'models/Paciente.php';
class MedicoController {

    public function citasHoy() {
    $Empleado = new Empleado();
    $Empleado->setDNI($_SESSION['session']->DNI);
    $resultadoMedico = $Empleado->showCitasHoyMedico();
    $citasTerminadas = $Empleado->showCitasHoyTerminadaMedico();
    //var_dump($resultadoCitas);
    require_once 'views/medico/citasHoyMedico.php';
    }

    public function misDatos() {
        require_once 'views/medico/misdatos.php';
    }

    public function citasProximas() {
        $Empleado = new Empleado();
        $Empleado->setDNI($_SESSION['session']->DNI);
        $resultadoCitas = $Empleado->showProximasCitasMedico();
        require_once 'views/medico/proximasCitaMedico.php';
    }

    public function historial() {
        $Empleado = new Empleado();
        $Empleado->setDNI($_SESSION['session']->DNI);
        $resultadoMedico = $Empleado->showHistorialCitas();
        require_once 'views/medico/historialMedico.php';
    }

    public function paciente() {
        $Empleado = new Empleado();
        $Empleado->setDNI($_SESSION['session']->DNI);
        $pacientes = $Empleado->misPacientes();
        require_once 'views/medico/pacienteMedico.php';
    }

    public function datosPaciente() {
        if ($_GET) {
            $DNI = isset($_GET['DNI']) ? $_GET['DNI'] : false;
            $Paciente = new Paciente();
            $Paciente->setDNI($DNI);
            $resultadoDatos = $Paciente->showDatos();
            $Empleado = new Empleado();
            $Empleado->setDNI($_SESSION['session']->DNI);
            $resultadoMedico = $Empleado->showCitasHoyMedico();
            $citasTerminadas = $Empleado->showCitasHoyTerminadaMedico();
            //var_dump($resultadoDatos->DNI);
            require_once 'views/medico/citasHoyMedico.php';
        }
    }

    public function updatePaciente() {
        if ($_POST) {
            $Paciente = new Paciente();
            isset($_POST['DNI']) ? $Paciente->setDNI(trim($_POST['DNI'])) : false;
            isset($_POST['nombre']) ? $Paciente->setNombre(trim($_POST['nombre'])) : false;
            isset($_POST['apellido']) ? $Paciente->setApellido(trim($_POST['apellido'])) : false;
            isset($_POST['direccion']) ? $Paciente->setDireccion(trim($_POST['direccion'])) : false;
            isset($_POST['localidad']) ? $Paciente->setLocalidad(trim($_POST['localidad'])) : false;
            isset($_POST['telefono']) ? $Paciente->setTelefono(trim($_POST['telefono'])) : false;
            $Paciente->updateDatos();

            $Empleado = new Empleado();
            $Empleado->setDNI($_SESSION['session']->DNI);
            $resultadoMedico = $Empleado->showCitasHoyMedico();
            $citasTerminadas = $Empleado->showCitasHoyTerminadaMedico();

            require_once 'views/medico/citasHoyMedico.php';
        }
    }    

    public function HistorialBuscador() {
        $Empleado = new Empleado();
        $dniPaciente= trim($_POST['DNI']);
        $resultadoMedico = $Empleado->showHistorialCitasBuscador($dniPaciente);
        require_once 'views/medico/historialMedico.php';
    }

    public function proximasCitasBuscador() {
        $Empleado = new Empleado();
        $dniPaciente= trim($_POST['DNI']);
        $resultadoCitas = $Empleado->showProximasCitasBuscador($dniPaciente);
        require_once 'views/medico/proximasCitaMedico.php';
    }

    public function datosPacienteYCitas() {
        if ($_GET) {
            //datos
            $DNI = isset($_GET['DNI']) ? $_GET['DNI'] : false;
            $Paciente = new Paciente();
            $Paciente->setDNI($DNI);
            $resultadoDatos = $Paciente->showDatos();
            //misPacientes
            $Empleado = new Empleado();
            $Empleado->setDNI($_SESSION['session']->DNI);
            $pacientes = $Empleado->misPacientes();
            
            //consultasPaciente
            $resultadoDatosConsultas = $Empleado->showCitasTerminadaMedicoHistorial($DNI);
            require_once 'views/medico/pacienteMedico.php';
        }
    }

}