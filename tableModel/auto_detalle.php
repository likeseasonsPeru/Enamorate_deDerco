<?php

class Auto extends EntidadBase{

    private $ID;
    private $coupons;
    private $full;
    private $hour;
    private $date;

    public function __construct(){
        $table="auto_";  // <- tabla de los models
        parent::__construct($table);
    }

   /* public function __construct($ID, $coupons, $full, $hour, $date){
        $table="turno";
        parent::__construct($table);
        $this->ID= $ID;
        $this->coupons= $coupons;
        $this->full= $full;
        $this->hour= $hour;
        $this->date= $date;
    }*/

}

?>