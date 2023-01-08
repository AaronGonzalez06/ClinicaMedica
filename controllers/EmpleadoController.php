<?php
require_once 'models/Empleado.php';
class EmpleadoController {

    public function citasHoy() {
    $Empleado = new Empleado();
    $resultadoCitas = $Empleado->showCitasHoy();
    //var_dump($resultadoCitas);
    require_once 'views/administrador/citasHoyAdministrador.php';
    }

    public function misDatos() {
        require_once 'views/administrador/misDatosAdministrador.php';
    }

    public function citasProximas() {
        $Empleado = new Empleado();
        $resultadoCitas = $Empleado->showProximasCitas();
        require_once 'views/administrador/citasProximasAdministrador.php';
    }

    public function nuevaCita() {
        $Empleado = new Empleado();
        $resultadoMedico = $Empleado->showMedicos();
        require_once 'views/administrador/nuevaCitaAdministrador.php';
    }

    public function proximasCitasBuscador() {
        $Empleado = new Empleado();
        $dniPaciente= trim($_POST['DNI']);
        $resultadoCitas = $Empleado->showProximasCitasBuscador($dniPaciente);
        require_once 'views/administrador/citasProximasAdministrador.php';
    }

    /*public function user(){
        $DNI = isset($_POST['usuario']) ? $_POST['usuario'] : false;
        $passwd = isset($_POST['password']) ? $_POST['password'] : false;
        $usuario = new Empleado();
        $usuario->setDNI($DNI);
        $usuario->setPasswd($passwd);
        //$_SESSION['sesion'] = $usuario;
        $resultado = $usuario->login();
        if($resultado == false){
            require_once 'views/login/login.php';
        } else{
            $_SESSION['session']= $resultado;
            if($resultado->tipo == 'Medico'){
                require_once 'views/medico/indexMedico.php';
            } elseif($resultado->tipo == 'Administrar'){
                require_once 'views/administrador/indexAdministrador.php';
            }

        }
    }*/

    /*public function session(){
        session_destroy();
        require_once 'views/login/login.php';
    }*/
}