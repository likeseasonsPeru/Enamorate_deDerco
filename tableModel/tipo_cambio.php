<?php

require_once 'EntidadBase.php';

class Cambio extends EntidadBase{

    public function __construct(){
        $table="tipo_cambio";
        parent::__construct($table);
    }
}

?>