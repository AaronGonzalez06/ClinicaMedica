<?php

class Cita {

    private $id;
    private $descripcionCita;
    private $tratamiento;
    private $estado;
    private $DNImedico;

    private $dia;
    private $hora;
    private $descripcionbreve;
    private $idCita;
    private $DNIpaciente;


    public function __construct() {
        $this->db = Database::connect();
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of descripcionCita
     */ 
    public function getDescripcionCita()
    {
        return $this->descripcionCita;
    }

    /**
     * Set the value of descripcionCita
     *
     * @return  self
     */ 
    public function setDescripcionCita($descripcionCita)
    {
        $this->descripcionCita = $descripcionCita;

        return $this;
    }

    /**
     * Get the value of tratamiento
     */ 
    public function getTratamiento()
    {
        return $this->tratamiento;
    }

    /**
     * Set the value of tratamiento
     *
     * @return  self
     */ 
    public function setTratamiento($tratamiento)
    {
        $this->tratamiento = $tratamiento;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of DNImedico
     */ 
    public function getDNImedico()
    {
        return $this->DNImedico;
    }

    /**
     * Set the value of DNImedico
     *
     * @return  self
     */ 
    public function setDNImedico($DNImedico)
    {
        $this->DNImedico = $DNImedico;

        return $this;
    }

    /**
     * Get the value of dia
     */ 
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set the value of dia
     *
     * @return  self
     */ 
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of descripcionbreve
     */ 
    public function getDescripcionbreve()
    {
        return $this->descripcionbreve;
    }

    /**
     * Set the value of descripcionbreve
     *
     * @return  self
     */ 
    public function setDescripcionbreve($descripcionbreve)
    {
        $this->descripcionbreve = $descripcionbreve;

        return $this;
    }

    /**
     * Get the value of idCita
     */ 
    public function getIdCita()
    {
        return $this->idCita;
    }

    /**
     * Set the value of idCita
     *
     * @return  self
     */ 
    public function setIdCita($idCita)
    {
        $this->idCita = $idCita;

        return $this;
    }

    /**
     * Get the value of DNIpaciente
     */ 
    public function getDNIpaciente()
    {
        return $this->DNIpaciente;
    }

    /**
     * Set the value of DNIpaciente
     *
     * @return  self
     */ 
    public function setDNIpaciente($DNIpaciente)
    {
        $this->DNIpaciente = $DNIpaciente;

        return $this;
    }

    public function addCita() {

       // $sql = "insert into comentarios values(null,(select id from productos where nombre='$nombre'),'{$this->getComentario()}',curdate());";
       $sql= "insert into paciente (DNI) values ('{$this->getDNIpaciente()}')";
       $this->db->query($sql);
       $sql= "insert into cita values (null,null,null,'Pendiente','{$this->getDNImedico()}')";
       $this->db->query($sql);
       $sql= "insert into pacientecita values ('{$this->getDia()}','{$this->getHora()}','{$this->getDescripcionbreve()}',(select id from cita order by id desc limit 1),'{$this->getDNIpaciente()}')";
       $save = $this->db->query($sql);

        $result = false;
        if ($save) {

            $result = true;
        }
        return $result;
    }

    public function endConsulta($dniPaciente){
        $sql = "update cita set tratamiento = '$this->tratamiento',descripcionCita = '$this->descripcionCita', estado='Terminada' where id=(select idCita from pacientecita where dia=curdate() and DNIpaciente='$dniPaciente');";                
        $save = $this->db->query($sql);
        return $save;
    }


}