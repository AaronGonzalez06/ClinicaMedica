<?php
require_once 'models/Empleado.php';
require_once 'models/cita.php';
class CitasController {
    public function newCita(){
        $DNIpaciente = isset($_POST['DNI']) ? $_POST['DNI'] : false;
        $DNImedico = isset($_POST['medico']) ? $_POST['medico'] : false;
        $dia = isset($_POST['dia']) ? $_POST['dia'] : false;
        $hora = isset($_POST['hora']) ? $_POST['hora'] : false;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
        $Cita = new Cita();
        $Empleado = new Empleado();
        $Cita->setDNImedico($DNImedico);
        $Cita->setDNIpaciente($DNIpaciente);
        $Cita->setDia($dia);
        $Cita->setHora($hora);
        $Cita->setDescripcionbreve($descripcion);
        $resultado = $Cita->addCita();

        if($resultado){
            $_SESSION['message'] =  "nueva cita.";
            $resultadoMedico = $Empleado->showMedicos();
            require_once 'views/administrador/nuevaCitaAdministrador.php';
        }else{
            $_SESSION['message'] =  "error.";
            $resultadoMedico = $Empleado->showMedicos();
            require_once 'views/administrador/nuevaCitaAdministrador.php';
        }
    }

    public function consulta() {
        if ($_POST) {
            $Cita = new Cita();
            isset($_POST['descripcion']) ? $Cita->setDescripcionCita(trim($_POST['descripcion'])) : false;
            isset($_POST['tratamiento']) ? $Cita->setTratamiento(trim($_POST['tratamiento'])) : false;
            $dniPaciente = trim($_POST['DNI']);
            $mirar = $Cita->endConsulta($dniPaciente);
            $Empleado = new Empleado();
            $Empleado->setDNI($_SESSION['session']->DNI);
            $resultadoMedico = $Empleado->showCitasHoyMedico();
            $citasTerminadas = $Empleado->showCitasHoyTerminadaMedico();
            require_once 'views/medico/citasHoyMedico.php';
        }
    }
}