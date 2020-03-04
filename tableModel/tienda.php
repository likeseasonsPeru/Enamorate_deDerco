<?php

include_once 'EntidadBase.php';

class Tienda extends EntidadBase{

   /*  private $ID;
    private $coupons;
    private $full;
    private $hour;
    private $date;
 */
    public function __construct(){
        $table='tiendas_derco';  // <- tabla de los models
        parent::__construct($table);
    }

   

}

?>