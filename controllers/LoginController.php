<?php
require_once 'models/Empleado.php';
class LoginController {

    public function index() {

        require_once 'views/login/login.php';
    }

    public function user(){
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
    }

    public function session(){
        session_destroy();
        require_once 'views/login/login.php';
    }
}