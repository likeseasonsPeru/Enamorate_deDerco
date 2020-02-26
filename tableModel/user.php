<?php

require_once 'EntidadBase.php';

class User extends EntidadBase{

    private $session;
    private $pres_min;
    private $pres_max;
    private $email;
    private $cell;

    public function __construct(){
        $table="registro_landing_campañaverano2020";
        parent::__construct($table);
    }

    public function getsession(){
        return $this->session;
    }

    public function setsession($session){
        $this->session = $session;
    }

    public function getpres_min(){
        return $this->pres_min;
    }

    public function setpres_min($pres_min){
        $this->pres_min = $pres_min;
    }

    public function getpres_max(){
        return $this->pres_max;
    }

    public function setpres_max($pres_max){
        $this->pres_max = $pres_max;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function getcell(){
        return $this->cell;
    }

    public function setcell($cell){
        $this->cell = $cell;
    }

    //       falta  cambiar

    public function save(){
        $query="INSERT INTO usuarios (DNI,Nombre,Email,Registered,Turno_ID)
                VALUES('".$this->dni."',
                       '".$this->name."',
                       '".$this->email."',
                       '".$this->registered."',
                       '".$this->turno."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }


}

?>