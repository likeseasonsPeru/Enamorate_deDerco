<?php

// for dev
include_once dirname(__DIR__) . '../tableModel/auto.php';
include_once dirname(__DIR__) . '../tableModel/tipo_cambio.php';

// for production
//include_once dirname(__FILE__).'../../tableModel/auto.php';
//include_once dirname(__FILE__).'../../tableModel/tipo_cambio.php';

//   Tipo de cambio

$cambio_model = new Cambio();
$cambio = $cambio_model->ejecutarSql("SELECT * FROM tipo_cambio");
$tipo_cambio = floatval($cambio[0]['tipo_cambio']);


$perfil = $_POST['perfil'];
$min = $_POST['min'];
$max = $_POST['max'];
$marca = $_POST['marca'];
$tipo_auto = $_POST['tipo'];


/*
$min = 10000;
$max = 20000;
$marca = 'Renault';
*/

$base_path = 'https://derco.com.pe/catalogo-derco/';

/*
$perfil = 'esforzado';
$pres_min = 10000;
$pres_max = 15000;
$email = 'alex@gmail.com';
$cell = '987456321';
*/


/* Filtros de búsqueda */
$query = 'SELECT * FROM autos2017';
$titulo_seccion = '';
//Valiamos la marca
if ($marca) {
    if ($marca == 'Todas las marcas') {
        $titulo_seccion = 'Seleccione un modelo';
        $query .= ' WHERE alias_marca!="null"';
    } else {

        $titulo_seccion .= 'Seleccione un ';
        //Titulo
        switch ($marca) {
            case 'suzuki':
                $titulo_seccion .= 'Suzuki';
                break;

            case 'mazda':
                $titulo_seccion .= 'Mazda';
                break;

            case 'ds':
                $titulo_seccion .= 'DS';
                break;

            case 'citroen':
                $titulo_seccion .= 'Citroën';
                break;

            case 'greatwall':
                $titulo_seccion .= 'Great Wall';
                break;

            case 'haval':
                $titulo_seccion .= 'Haval';
                break;

            case 'foton':
                $titulo_seccion .= 'Foton';
                break;

            case 'jac':
                $titulo_seccion .= 'Jac';
                break;

            case 'changan':
                $titulo_seccion .= 'Changan';
                break;

            case 'renault':
                $titulo_seccion .= 'Renault';
                //$meta_descripcion .= 'Catálogo de autos y camionetas de la marca Renault con diversos modelos. Derco es el mayor operador de venta de autos en Perú. ACCEDE AHORA.';
                break;
        }

        $query .= ' WHERE alias_marca="' . $marca . '"';
    }
}

//Validamos el modelo
if ($tipo_auto != 'todas') {
    $i = 0;
    foreach ($tipo_auto as $value) {

        if ($i == 0) {
            $query .= " AND (";
        } else {
            $query .= " OR ";
        }

        $query .= 'tipo_auto="' . $value . '"';
        $i++;
    }

    $query .= ') ';
}


$auto_model = new Auto();

if ($perfil != null) {
    
    if ($perfil == 'emprendedor') {
        $query = "SELECT * FROM autos2017 where (modelo = 'HONOR S' or  modelo= 'NEW VAN' or  modelo= 'GRAND VAN TURISMO' or modelo='GRAND SUPERVAN' or  modelo= 'M90' or  modelo= 'A500' or  modelo= 'C-ELYSÉE' or  modelo= 'NEW C30' or  modelo= 'WINGLE 5 GASOLINA' or  modelo= 'WINGLE 5 DIESEL' or  modelo= 'WINGLE 7 DIESEL' or modelo='J4' or modelo='REFINE' or modelo='SUNRAY' or modelo='T6' or modelo='X200' or modelo= 'BT-50' or modelo= 'Alaskan' or modelo='Logan' or modelo='Master' or modelo='Oroch' or modelo='APV VAN' or modelo='NEW CIAZ' or modelo='ERTIGA')";
    } else if ($perfil == 'esforzado') {
        $query = "SELECT * FROM autos2017 where (modelo= 'CS15' or  modelo= 'C-ELYSÉE' or modelo= 'NEW C3' or  alias_modelo= 'new-c4-cactus' or  modelo='NEW M4' or modelo= 'NEW H2' or modelo= 'J4' or modelo='S2' or modelo='MAZDA 2 SEDAN' or modelo='NEW ALTO' or modelo='CELERIO' or modelo = 'NEW DZIRE')";
    } else if ($perfil == 'nuevo adulto') {
        $query = "SELECT * FROM autos2017 where (modelo= 'CS35 PLUS' or  modelo= 'CS55' or modelo= 'NEW C3' or  alias_modelo= 'new-c4-cactus' or  modelo='C5 AIRCROSS' or modelo= 'H3' or modelo= 'NEW H2' or modelo='H6 Sport' or modelo='S2' or modelo='S3' or modelo='GRAND S3' or modelo = 'BT-50' or modelo='CX-3' or modelo='CX-30' or modelo='MAZDA 2 SPORT' or modelo='MX-5' or modelo='MAZDA 3 SEDAN' or modelo='MAZDA 3 SPORT' or modelo='MAZDA 6 SEDAN' or modelo='MX5 RF' or modelo='KWID' or modelo='BALENO' or modelo='GRAND VITARA' or modelo='JIMNY' or modelo='SWIFT SEDAN' or modelo='NEW VITARA') ";
    } else if ($perfil == 'familion') {
        $query = "SELECT * FROM autos2017 where (modelo = 'suv' or  modelo= 'van')";
    }
}


//Validamos el precio minimo
if ($min) {
    $query .= ' AND dolares>="' . $min . '"';
}

//Validamos el precio máximo
if ($max) {
    $query .= ' AND dolares<="' . $max . '"';
}

//Orden
if ($min != '' || $max != '') {
    $query .= ' AND estado="1" ORDER BY dolares ASC;';
} else {
    $query .= ' AND estado="1" ORDER BY id, dolares ASC;';
}

$autos = $auto_model->ejecutarSql($query);
$autos_pag = '';
$count = 0;

if ($autos[0] != null) {
    foreach ($autos as $autos2) {
        //foreach ($autos2 as $autos3) {
        foreach ($autos2 as $auto) {
            $count++;
            $thumbnail = $base_path . '/assets/modelos/281x180/' . $auto['alias_marca'] . '/' . $auto['foto_principal'];
            $dolares = $auto['dolares'];
            $soles = $dolares * $tipo_cambio;

            if ($dolares == 0) {
                $dolares = '<span style="font-size:14px;">Precio no disponible</span>';
            } else {
                //Separador y Símbolo de Dólar
                $dolares = 'USD ' . number_format($dolares);
                $soles = 'S/ ' . number_format($soles);
            }
            /*
            $autos_pag .= '<div class="col-4 col-md-6 col-lg-4 fixPad card-border">';
            $autos_pag .= '<div class="col-4 cardB">';
            $autos_pag .= '<div class="col-12">';
            $autos_pag .= '<h1 class="precio-card right">Desde ' . $auto['dolares'] . '$</h1>';
            $autos_pag .= '</div><div class="col-12">';
            $autos_pag .= '<img class="imgResponsive" src="' . $thumbnail . '" alt=""></div>';
            $autos_pag .= '<div class="col-12">';
            $autos_pag .= '<p class="text-left textoGeneral">' . $auto['modelo'] . '</p>';
            $autos_pag .= '<p class="text-left textoGeneral">' . $auto['marca'] . '</p></div>';
            $autos_pag .= '<div class="row">';
            $autos_pag .= '<a class="col-lg-6">VER MÁS</a>';
            $autos_pag .= '<a class="col-lg-6" href="models/cotizador.php?modelo=' . $auto['alias_modelo'] . '&marca=' . $auto['marca'].'">COTIZAR</a></div></div></div>';
            */


            $autos_pag .= '<div class="col-xs-12 col-sm-6 col-md-4 mt-30 text-center sm-padding">';
            $autos_pag .= '<div id="' . $auto['alias_marca'] . '" class="modelo" data-marca="' . $auto['alias_marca'] . '" data-modelo="' . $auto['alias_modelo'] . '">';
            $autos_pag .= '<div class="datos">';
            $autos_pag .= '<h3 class="titulo-carro">' . $auto['modelo'] . '<span style="font-size: 14px;vertical-align: top; font-family: Arial;"> **</span></h3>';
            $autos_pag .= '<p class="precio-carro">' . 'Desde ' . $dolares . ' o ' . '</p>';
            $autos_pag .= '<p class="precio-carro">' . $soles . '</p>';
            $autos_pag .= '<p class="informacion-basica">Año Módelo ' . $auto['Precio_anio'] . '</p>';
            if ($auto['preventa'] == 'si') {
                $autos_pag .= '<p class="precio-carro" style="font-size: 12px;">Precio Preventa</p>';
            }
            $autos_pag .= '</div>';
            $autos_pag .= '<div class="img-auto"><img src="' . $thumbnail . '" class="img-filtro" /></div>';
            $autos_pag .= '<p class="informacion-basica"><!--Año: 2016--><br>' . $auto['resumen'] . '</p>';
            $autos_pag .= '<a class="bt-transparente" href="'. $auto['alias_modelo'] . '/' . $auto['marca'] . '">VER DETALLE</a>';
            $autos_pag .= '<a class="bt-transparente" href="'. $auto['alias_modelo'] . '/' . $auto['marca'] . '">COTIZAR</a>';
            $autos_pag .= '</div>';
            $autos_pag .= '</div>';
        }
        //  }
    }
}
if ($autos == null || $count == 0) {
    $autos_pag = '<div class="col-sm-12 col-md-12 mt-30 text-center"><p style="font-size: 16px; color: #dc241f;font-weight: bold;">No se encontraron resultados de tu búsqueda.</p></div>';
}

$autos_pag .= '</div>';


?>


<!-- <div id="contenedor"> -->
<div class="col-12 text-center">
    <h1 class="titulo-autos text-center">TENEMOS LO QUE NECESITAS</h1>
    <div class="container text-center">
    <h2 id="selecciona" class="titulo-autos text-center">Seleccione un modelo</h2>
        <div class="row">
            <?php echo $autos_pag ?>


            <!--div class="col-4 col-md-6 col-lg-4 fixPad card-border">
                <div class="col-4 cardB">
                    <div class="col-12">
                        <p class="modelo topTitle">New alto</p>
                        <h2 class="precio-card right">
                        Desde USD 14,990 o $19000
                        </h3>
                        <p class="año">Año modelo 2020</p>
                    </div>
                    <div class="col-12">
                        <img class="imgResponsive" src="app/img/3sporthome.jpg" alt="">
                    </div>
                    <div class="col-12">
                        <p class="text-left textoGeneral detalles">
                            Tracción: 2WD 
                            <br>
                            Transmisión: AT/MT
                        </p>
                    </div>

                    <div class="row spaceBtns">
                        <button class="col-5 centerInputs card-button">Ver más</button>
                        <button class="col-5 centerInputs card-button">Cotizar</button>
                        <!--a class="col-lg-6">VER MÁS</a-->
            <!--a class="col-lg-6" href="models/cotizador.php?marca=">COTIZAR</a
                   </div>
                </div>
            </div-->

            <!--Card Derco-->

            <!------------------------------------------->

            <!-- <div class="col-xs-12 col-sm-6 col-md-4  col-lg-3 col-xl-3 mt-20 mb-20 text-center sm-padding">
                <div id="suzuki" class="modelo pd-filtro card-filtro" data-marca="suzuki" data-modelo="new-alto">
                    <div class="datos">
                        <h3 class="titulo-carro">
                            "NEW ALTO"
                            <span style="font-size: 14px; vertical-align: top; font-family: Arial;">**</span>
                        </h3>
                        <p class="precio-carro">Desde USD 7,190 o </p>
                        <p class="precio-carro">S/. 24,446</p>
                        <p class="información-basica">Año Modelo 2020</p>
                    </div>
                    <div clas="img-auto">
                        <img src="app/img/3sporthome.jpg" class="img-filtro">
                    </div>
                    <p class="informacion-basica">
                        <br>
                        "Tracción: 2WD | Transimisión MT"
                    </p>
                    <button class="bt-transparente bt-transparente-pd">VER DETALLE</button>
                    <button class="bt-transparente bt-transparente-pd">COTIZAR</button>
                </div>
            </div> -->

            <!------------------------------------------->

            <!--
            <div class="col-4 col-md-6 col-lg-4 fixPad card-border">
                <div class="col-4 cardB">
                    <div class="col-12">
                        <h1 class="precio-card">
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
                        <h1 class="precio-card">
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
            </div> -->
        </div>

        <!-- <div class="marg">
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
        </div> -->
    </div>
</div>
<!-- </div> -->

<script type="text/javascript">
    /* var buscar_modelo = [];

    $(document).ready(function() {


        $('.modelo-select').click(function() {

            if ($(this).hasClass('checkbox-modelo-selected-color')) {
                //Removemos del array de búsqueda por modelos
                var index = buscar_modelo.indexOf(this.id);

                if (index > -1) {
                    buscar_modelo.splice(index, 1);
                }
            } else {
                //Agregamos al array de búsqueda por modelos
                buscar_modelo.push(this.id);
            }

            $(this).toggleClass('checkbox-modelo-selected-color');
            $(this).children('.checkbox-modelo').toggleClass('checkbox-modelo-selected');

            console.log(buscar_modelo);
        });

    }) */
</script>