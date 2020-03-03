<?php

include_once 'tableModel/auto.php';
/*
$perfil = $_POST['perfil'];
$pres_min = $_POST['pres_min'];
$pres_max = $_POST['pres_max'];
$email = $_POST['email'];
$cell = $_POST['cell'];

 */

$perfil = 'esforzado';
$pres_min = 10000;
$pres_max = 15000;
$email = 'alex@gmail.com';
$cell = '987456321';

if ($perfil != null && $email != null && $pres_min != null && $pres_max != null && $email != null && $cell != null) {
   /*  $user_model = new User();
    $user =  $user_model->getBy('sessionid', $session_id); */

    /*
    if ($user != null) {
        $user_model->setsession($session_id);
        $user_model->setpres_min($pres_min);
        $user_model->setpres_max($pres_max);
        $user_model->setEmail($email);
        $user_model->setcell($cell);
        $user_model->save();
    }*/

    $auto_model = new Auto();

    $query = '';

    if ($perfil == 'emprendedor'){
        $query = 'SELECT * FROM autos2017 where (tipo_auto = "van" or  tipo_auto= "sedan" or  tipo_auto= "suv") and dolares between $pres_min and $pres_max;';
    }else if ($perfil == 'esforzado'){
        $query = 'SELECT * FROM autos2017 where (tipo_auto= "sedan" or  tipo_auto= "suv") and dolares between $pres_min and $pres_max;';
    }else if ($perfil == 'nuevo adulto'){
        $query = 'SELECT * FROM autos2017 where (tipo_auto = "hatchback" or  tipo_auto= "sedan" or  tipo_auto= "suv") and dolares between $pres_min and $pres_max;';
    }else if ($perfil == 'familion'){
        $query = 'SELECT * FROM autos2017 where (tipo_auto = "suv" or  tipo_auto= "van") and dolares between $pres_min and $pres_max;';
    }

    $autos = $auto_model->ejecutarSql($query);
    $autos_pag = '';

    if ($autos != null){
        var_dump($autos);
        /* foreach($autos as $autos2){
            foreach($autos2 as $autos3){
                foreach($autos3 as $auto){
                    $autos_pag .= '<div class="col-4 col-md-6 col-lg-4 fixPad card-border">';
                    $autos_pag .= '<div class="col-4 cardB">';
                    $autos_pag .=
                }
            }
        } */
    }

} else {

}


$view = $path['views'].basename($_SERVER['PHP_SELF']);
require $path['layout'].'template.php';
?>
