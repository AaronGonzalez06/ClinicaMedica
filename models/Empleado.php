<?php
class Empleado {

    private $DNI;
    private $nombre;
    private $apellido;
    private $direccion;
    private $localidad;
    private $telefono;
    private $tipo;
    private $passwd;

    

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

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of passwd
     */ 
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * Set the value of passwd
     *
     * @return  self
     */ 
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }


    public function login() {
        $DNI = $this->DNI;
        $passwd = $this->passwd;
        $sql = "select * from empleado where DNI='$DNI' and passwd='$passwd';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $datos = $login->fetch_object();
            return $datos;
        }

        return false;
    }

    public function showCitasHoy(){
        $sql = "select pac.hora, pac.DNIpaciente, ci.DNImedico,pac.descripcionbreve from pacienteCita pac inner join cita ci on ci.id=pac.idCita where pac.dia=curdate() order by pac.hora asc;";
        $citas = $this->db->query($sql);  
        return $citas;
    }

    public function showProximasCitas(){
        $sql = "select pac.dia,pac.hora, pac.DNIpaciente, ci.DNImedico,pac.descripcionbreve from pacienteCita pac inner join cita ci on ci.id=pac.idCita where pac.dia>curdate() order by pac.dia asc, pac.hora asc;";
        $citas = $this->db->query($sql);  
        return $citas;
    }
    
    public function showMedicos(){
        $sql = "select DNI, nombre from empleado where tipo='Medico';";
        $medicos = $this->db->query($sql);  
        return $medicos;
    }

    public function showProximasCitasMedico(){
        $DNImedico = $this->DNI;
        $sql = "select pac.dia,pac.hora, pac.DNIpaciente, ci.DNImedico,pac.descripcionbreve from pacienteCita pac inner join cita ci on ci.id=pac.idCita where pac.dia>curdate() and ci.DNImedico='$DNImedico' order by pac.dia asc, pac.hora asc;";
        $citas = $this->db->query($sql);  
        return $citas;
    }

    public function showHistorialCitas(){
        $DNImedico = $this->DNI;
        $sql = "select pac.dia,pac.hora, pac.DNIpaciente, ci.DNImedico,pac.descripcionbreve, ci.estado from pacienteCita pac inner join cita ci on ci.id=pac.idCita where pac.dia<curdate() and ci.DNImedico='$DNImedico' order by pac.dia asc, pac.hora asc;";
        $citas = $this->db->query($sql);  
        return $citas;
    }

    public function showCitasHoyMedico(){
        $DNImedico = $this->DNI;
        $sql = "select pac.dia,pac.hora, pac.DNIpaciente, ci.DNImedico,pac.descripcionbreve, ci.estado from pacienteCita pac inner join cita ci on ci.id=pac.idCita where pac.dia=curdate() and ci.estado='Pendiente' and ci.DNImedico='$DNImedico' order by pac.dia asc, pac.hora asc;";
        $citas = $this->db->query($sql);  
        return $citas;
    }

    public function showCitasHoyTerminadaMedico(){
        $DNImedico = $this->DNI;
        $sql = "select pac.dia,pac.hora, pac.DNIpaciente, ci.DNImedico,pac.descripcionbreve, ci.estado from pacienteCita pac inner join cita ci on ci.id=pac.idCita where pac.dia=curdate() and ci.estado='Terminada' and ci.DNImedico='$DNImedico' order by pac.dia asc, pac.hora asc;";
        $citas = $this->db->query($sql);  
        return $citas;
    }

    public function showHistorialCitasBuscador($dniPaciente){
        $sql = "select pac.dia,pac.hora, pac.DNIpaciente, ci.DNImedico,pac.descripcionbreve, ci.estado from pacienteCita pac inner join cita ci on ci.id=pac.idCita where pac.dia<curdate() and pac.DNIpaciente='$dniPaciente' order by pac.dia asc, pac.hora asc;";
        $citas = $this->db->query($sql);  
        return $citas;
    }

    public function showProximasCitasBuscador($dniPaciente){
        $sql = "select pac.dia,pac.hora, pac.DNIpaciente, ci.DNImedico,pac.descripcionbreve, ci.estado from pacienteCita pac inner join cita ci on ci.id=pac.idCita where pac.dia>curdate() and pac.DNIpaciente='$dniPaciente' order by pac.dia asc, pac.hora asc;";
        $citas = $this->db->query($sql);  
        return $citas;
    }

    public function misPacientes(){
        $DNImedico = $this->DNI;
        $sql = "select distinct pac.DNIpaciente from pacienteCita pac inner join cita ci on ci.id=pac.idCita where ci.DNImedico='$DNImedico' order by pac.DNIpaciente asc;";
        $pacientes = $this->db->query($sql);  
        return $pacientes;
    }

    public function showCitasTerminadaMedicoHistorial($DNIpaciente){
        $DNImedico = $this->DNI;
        $sql = "select pac.dia,pac.hora,pac.descripcionbreve,ci.tratamiento, ci.descripcionCita from pacienteCita pac inner join cita ci on ci.id=pac.idCita where ci.estado='Terminada' and ci.DNImedico='$DNImedico' and pac.DNIpaciente='$DNIpaciente' order by pac.dia asc, pac.hora asc;";
        $citas = $this->db->query($sql);  
        return $citas;
    }
    
}