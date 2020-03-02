<?php

include_once '../tableModel/auto.php';
/* 
$perfil = $_POST['perfil'];
$pres_min = $_POST['min'];
$pres_max = $_POST['max'];
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

?>

<div class="col-12 text-center">
    <h1>TENEMOS LO QUE NECESITAS</h1>
    <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h2>
    <div class="container text-center">
        <div class="row">
            <div class="col-4 col-md-6 col-lg-4 fixPad card-border">
                <div class="col-4 cardB">
                    <div class="col-12">
                        <h1 class="titulo right">
                            $19000
                        </h1>
                    </div>
                    <div class="col-12">
                        <img class="imgResponsive" src="app/img/3sporthome.jpg" alt="">
                    </div>
                    <div class="col-12">
                        <p class="text-left textoGeneral">
                            Swift Sport
                        </p>
                        <p class="text-left textoGeneral">
                            Suzuki
                        </p>
                    </div>

                    <div class="row">
                        <a class="col-lg-6" href="">VER MÁS</a>
                        <a class="col-lg-6" href="cotizador.php">COTIZAR</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-6 col-lg-4 fixPad card-border">
                <div class="col-4 cardB">
                    <div class="col-12">
                        <h1 class="titulo">
                            $19000
                        </h1>
                    </div>
                    <div class="col-12">
                        <img class="imgResponsive" src="app/img/3sporthome.jpg" alt="">
                    </div>
                    <div class="col-12">
                        <p class="text-left textoGeneral">
                            Swift Sport
                        </p>
                        <p class="text-left textoGeneral">
                            Suzuki
                        </p>
                    </div>

                    <div class="row">
                        <a class="col-lg-6">VER MÁS</a>
                        <a class="col-lg-6">COTIZAR</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-6 col-lg-4 fixPad card-border">
                <div class="col-4 cardB">
                    <div class="col-12">
                        <h1 class="titulo">
                            $19000
                        </h1>
                    </div>
                    <div class="col-12">
                        <img class="imgResponsive" src="app/img/3sporthome.jpg" alt="">
                    </div>
                    <div class="col-12">
                        <p class="text-left textoGeneral">
                            Swift Sport
                        </p>
                        <p class="text-left textoGeneral">
                            Suzuki
                        </p>
                    </div>
                    <div class="row">
                        <a class="col-lg-6">VER MÁS</a>
                        <a class="col-lg-6">COTIZAR</a>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
        <div class="marg">
            <nav class="paginador-area" aria-label="Page navigation example">
                <ul class="pagination col-12 justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>



<script type="text/javascript">
    $.ajax({
        url: 'models/inicio.php',
        type: 'POST',
        data: {
            session: session
        },
        datatype: 'html',
        success: function(datahtml) {
            $('body').css("background-image", "url('app/images/background_madrenatura1.png')");
            $('body').css('background-size', 'cover');
            document.getElementById("tituloHeader").style.opacity = "0";
            setTimeout(() => {
                document.getElementById("tituloHeader").style.opacity = "1";
                document.getElementById("tituloHeader").style.textAlign = "left";
                $('.contenedor-datos').html(datahtml);
            }, 500)


        },
        error: function() {
            $('.contenedor-datos').html('<p>error al cargar desde Ajax</p>');
        }
    });
</script>