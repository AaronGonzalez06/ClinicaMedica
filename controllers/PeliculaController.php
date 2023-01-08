<?php

require_once 'models/pelicula.php';

class PeliculaController {

public function index() {

    require_once 'views/pelicula/destacado.php';
}


public function film() {
    $peliculas = new Pelicula();
    $resultado = $peliculas->show();
    //var_dump($resultado);

    require_once 'views/pelicula/film.php';
}

public function info() {
    if ($_GET) {
        $film = isset($_GET['film']) ? $_GET['film'] : false;
        $cineGet = isset($_GET['cine']) ? $_GET['cine'] : false;
        $info = new Pelicula();
        $info->setNombre($film);
        $infoFilm = $info->film($film);
        $horario = $info->horarios($film);
        $cinepeli = $info->cine($film);

        require_once 'views/pelicula/info.php';
    }
}






public function entrada() {
    if ($_GET) {
        
        $film = isset($_GET['film']) ? $_GET['film'] : false;
        $cine = isset($_GET['cine']) ? $_GET['cine'] : false;
        $hora = isset($_GET['hora']) ? $_GET['hora'] : false;
        $dia = isset($_GET['dia']) ? $_GET['dia'] : false;
        $sala = isset($_GET['sala']) ? $_GET['sala'] : false;


        $info = new Pelicula();
        $info->setNombre($film);
        $infoFilm = $info->film($film);
        $horario = $info->horarios($film);
        $cinepeli = $info->cine($film);

        require_once 'views/pelicula/entrada.php';
    }
}




public function all(){
    $info = new Pelicula();
    $filmInfo = $info->show();

require_once 'views/pelicula/all.php';
}



}