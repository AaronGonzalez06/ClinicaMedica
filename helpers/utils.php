<?php

class Utils {

    public static function provincia() {

        require_once 'models/cine.php';
        $cine = new Cine();
        $provincia = $cine->show();
        return $provincia;
    }








//prueba para la verificacion de sitios
    public static function verificarSitio($pelicula,$num_sala,$hora,$fecha,$cine) {

        require_once 'models/pelicula.php';
        $datos = new Pelicula();
        $sitios = $datos->comprobar($pelicula,$num_sala,$hora,$fecha,$cine);
        return $sitios;
    }






    public static function genero() {
        require_once 'models/pelicula.php';
        $pelicula = new Pelicula();
        $genero = $pelicula->genero();
        return $genero;
    }





    public static function footer() {

        require_once 'models/cine.php';
        $cine = new Cine();
        $footer = $cine->showFooter();
        return $footer;
    }

    public static function img_film() {

        require_once 'models/pelicula.php';
        $cine = new Pelicula();
        $img = $cine->imgFilm();
        return $img;
    }


    public static function diaSemana($dia) {
        switch ($dia) {

            case "Sun":
                return "Domingo";
                break;

            case "Mon":
                return "Lunes";
                break;

            case "Tue":
                return "Martes";
                break;

            case "Wed":
                return "Miercoles";
                break;   
                
            case "Thu":
                return "Jueves";
                break; 

            case "Fri":
                return "Viernes";
                break;
                
            case "Sat":
                return "Sabado";
                break;                
        }

 
    }



}