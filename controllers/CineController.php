<?php

require_once 'models/cine.php';

class CineController {




public function peliculas() {
    if ($_POST) {
        
        $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
        $cine = isset($_POST['cine']) ? $_POST['cine'] : false;
        $info = new Cine();
        $info->setNombre($cine);
        $infoFilm = $info->showFilm($cine);
        //$horario = $info->horarios($film);
        //$cinepeli = $info->cine($film);

        require_once 'views/cine/info.php';
    } else if($_GET){
        
        $cine = isset($_GET['cine']) ? $_GET['cine'] : false;
        $info = new Cine();
        $info->setNombre($cine);
        $infoFilm = $info->showFilm($cine);
        //$horario = $info->horarios($film);
        //$cinepeli = $info->cine($film);

        require_once 'views/cine/info.php';



    }
}




}