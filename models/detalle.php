 <?php

require_once '../tableModel/autos.php';

$modelo = htmlspecialchars($_GET["modelo"]);
$marca = htmlspecialchars($_GET["marca"]);

if ($marca != null && $modelo != null){
    $auto_model = new Auto();

    //$autos = $user->ejecutarSql();

}

 ?>