<?php

require_once 'EntidadBase.php';

class User extends EntidadBase{

    private $modelo;
    private $version;
    private $nombre;
    private $apellido;
    private $tipo_doc;
    private $razon;
    private $num_doc;
    private $cell;
    private $email;
    private $tienda;
    private $perfil;
    private $pres_min;
    private $pres_max;
    private $provincia;
    
     
    public function __construct($modelo, $version, $nombre, $apellido, $tipo_doc, $razon, $num_doc, $cell, $email, $tienda, $perfil, $pres_min, $pres_max, $provincia){
        $this->modelo = $modelo;
        $this->version = $version;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipo_doc = $tipo_doc;
        $this->razon = $razon;
        $this->num_doc = $num_doc;
        $this->cell = $cell;
        $this->email = $email;
        $this->tienda = $tienda;
        $this->perfil = $perfil;
        $this->pres_min = $pres_min;
        $this->pres_max = $pres_max;
        $this->provincia =$provincia;
        // table
        $table="registro_derco_oportunidades";
        parent::__construct($table);
    }
/* 
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
    } */

    //       falta  cambiar

    public function save(){
        $query="INSERT INTO registro_derco_oportunidades (nombres, apellidos, tipo_doc, razon, numero_doc, celular, correo, tienda, perfil, precio_min, precio_max, modelo, versio, provincia)
                VALUES('".$this->nombre."',
                       '".$this->apellido."',
                       '".$this->tipo_doc."',
                       '".$this->razon."',
                       '".$this->num_doc."',
                       '".$this->cell."',
                       '".$this->email."',
                       '".$this->tienda."',
                       '".$this->perfil."',
                       '".$this->pres_min."',
                       '".$this->pres_max."',
                       '".$this->modelo."',
                       '".$this->version."',
                       '".$this->provincia."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

}
