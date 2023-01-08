<?php
class Paciente {

    private $DNI;
    private $nombre;
    private $apellido;
    private $direccion;
    private $localidad;
    private $telefono;



    public function __construct() {
        $this->db = Database::connect();
    }



    /**
     * Get the value of DNI
     */ 
    public function getDNI()
    {
        return $this->DNI;
    }

    /**
     * Set the value of DNI
     *
     * @return  self
     */ 
    public function setDNI($DNI)
    {
        $this->DNI = $DNI;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of localidad
     */ 
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set the value of localidad
     *
     * @return  self
     */ 
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }


    public function showDatos(){
        //$DNIpaciente = $this->DNI;
        $sql = "select * from paciente where DNI='$this->DNI';";
        $datos = $this->db->query($sql);  
        return $datos->fetch_object();
    }

    public function updateDatos(){
        $DNIpaciente = $this->DNI;
        $sql = "update paciente set nombre='$this->nombre', apellido='$this->apellido', direccion='$this->direccion' , telefono=$this->telefono , localidad='$this->localidad' where DNI='$this->DNI';";
        $datos = $this->db->query($sql);  
        return $datos;
    }

}