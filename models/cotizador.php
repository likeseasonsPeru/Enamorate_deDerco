<?php

// for dev
include_once dirname(__DIR__) . '../tableModel/auto.php';
include_once dirname(__DIR__) . '../tableModel/tienda.php';
include_once dirname(__DIR__) . '../tableModel/tipo_cambio.php';

// for produccion
//include_once dirname(__FILE__).'../../tableModel/tienda.php';
//include_once dirname(__FILE__).'../../tableModel/tipo_cambio.php';
//include_once dirname(__FILE__).'../../tableModel/auto.php';

//   Tipo de cambio

$cambio_model = new Cambio();
$cambio = $cambio_model->ejecutarSql("SELECT * FROM tipo_cambio");
$tipo_cambio = floatval($cambio[0]['tipo_cambio']);

$marca = $_GET['marca'];
$modelo = $_GET['modelo'];
//$marcaid = '';

$base_path = 'https://derco.com.pe/catalogo-derco';
$site_url = 'catalogo-derco';

// Utms

$utm_source = '';
$utm_campaign = '';
$utm_medium = '';
if (isset($_GET['utm_source'])) {
    $utm_source = $_GET['utm_source'];
} else {
    $utm_source = 'DercoOportunidades';
}
if (isset($_GET['utm_campaign'])) {
    $utm_campaign = $_GET['utm_campaign'];
} else {
    $utm_campaign = 'None';
}
if (isset($_GET['utm_medium'])) {
    $utm_medium = $_GET['utm_medium'];
} else {
    $utm_medium = 'DercoOportunidades';
}

// autos 

$auto_model = new Auto();
$autos_marca = $auto_model->ejecutarSql("SELECT * FROM autos2017 WHERE alias_modelo='$modelo'");


foreach ($autos_marca as $auto) {
    
        $color_techo = '';
        $html_techo = '';

        $marca = $auto['marca'];
        $modelo = $auto['modelo'];
        $foto_principal = $auto['foto_principal'];
        $alt_img = $auto['alt_img'];
        $meta_descripcion = $auto['meta_descripcion'];
        $meta_titulo = $auto['meta_titulo'];
        $color_auto = $auto['color_auto'];
        $color_techo = $auto['color_techo'];
        $foto_fondo = $auto['foto_fondo'];
        $informacion_basica = htmlspecialchars($auto['informacion_basica'],ENT_COMPAT,'ISO-8859-1', true);
        //var_dump($informacion_basica);
        $ficha_tecnica = htmlspecialchars($auto['ficha_tecnica'], ENT_COMPAT,'ISO-8859-1', true);
        //var_dump($ficha_tecnica);

        $dolares = $auto['dolares'];
        $precio_anio = $auto['Precio_anio'];
        $preventa = $auto['preventa'];
        $autopdf = $auto['auto_pdf'];


        // Logotipo y Foto ....
        switch ($marca) {
            case 'Suzuki':
                $logo = 'logosuzuki.png';
                $alias = 'suzuki';
                $marca_sap = 'SUZUKI';
                $marca_tienda = $marca_sap;
                break;

            case 'Citroën':
                $logo = 'logocitroen.png';
                $alias = 'citroen';
                $marca_sap = 'CITROËN';
                $marca_tienda = 'CITROEN';
                break;

            case 'DS':
                $logo = 'logo-ds-big.png';
                $alias = 'ds';
                $marca_sap = 'DS';
                $marca_tienda = $marca_sap;
                break;

            case 'Mazda':
                $logo = 'logomazda.png';
                $alias = 'mazda';
                $marca_sap = 'MAZDA';
                $marca_tienda = $marca_sap;

                break;

            case 'Great wall':
                $logo = 'logogreatwall.png';
                $alias = 'great-wall';
                $marca_sap = 'GREAT WALL';
                $marca_tienda = $marca_sap;
                break;

            case 'Haval':
                $logo = 'logohaval.png';
                $alias = 'haval';
                $marca_sap = 'HAVAL';
                $marca_tienda = $marca_sap;
                break;

            case 'Foton':
                $logo = 'logofoton.png';
                $alias = 'foton';
                $marca_sap = 'FOTON';
                $marca_tienda = $marca_sap;
                break;

            case 'Jac':
                $logo = 'logojac.png';
                $alias = 'jac';
                $marca_sap = 'JAC';
                $marca_tienda = $marca_sap;
                break;

            case 'Changan':
                $logo = 'logochangan.png';
                $alias = 'changan';
                $marca_sap = 'CHANGAN';
                $marca_tienda = $marca_sap;
                break;

            case 'Renault':
                $logo = 'logorenault.png';
                $alias = 'renault';
                $marca_sap = 'RENAULT';
                $marca_tienda = $marca_sap;
                break;
        }

        if ($autopdf != '') {
            $desaparecer = 'desaparecer';
            $aparecer = 'aparecer';
            $ficha_tecnicaBloque = '
    <div class="fusion-builder-row fusion-row desaparecerPDF' . $aparecer . '">
        <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_1  fusion-one-full fusion-column-first fusion-column-last 1_1" style="margin-top:0px;margin-bottom:0px;">
            <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
                <div class="fusion-clearfix"></div>
            </div>

              <a target="_blank" class="descargaPDF col-xs-offset-0 col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4 " href="' . $base_path . '/assets/pdfs/' . $alias . '/' . $autopdf . '" aria-hidden="true">

                    DESCARGAR FICHA TÉCNICA  <span class="fa fa-arrow-down fa-1x"></span>
              </a>
        </div>
    </div>
     ';
        } else {
            $desaparecer = '';
            $aparecer = '';
            $ficha_tecnicaBloque = '
            <div class="fusion-fullwidth fullwidth-box fusion-parallax-none nonhundred-percent-fullwidth " style="background-color: rgba(255,255,255,0);background-image: url("' . $base_path . '/assets/modelos/fondos/default1.jpg");background-position: center center;background-repeat: no-repeat;padding-top:5%;padding-right:30px;padding-bottom:5%;padding-left:30px;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;background-attachment:none;">
            <div class="fusion-builder-row fusion-row ' . $desaparecer . '">
                <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_1  fusion-one-full fusion-column-first fusion-column-last 1_1" style="margin-top:0px;margin-bottom:0px;">
                    <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
        <div class="contenttablescroll">
        <table class="table table-responsive table-bordered custom-table bordernone tabletecnicacr" width="100%">
        ' . html_entity_decode($ficha_tecnica). '
        </table>
        </div>
                        <div class="fusion-clearfix"></div>
                    </div>
                </div>
            </div>
            </div>
            ';
        }

        //Ruta de foto
        $foto_principal = $base_path . '/assets/modelos/1000x600/' . $alias . '/' . $foto_principal;

        $soles = $dolares * $tipo_cambio;

        //Separador y Símbolo de Dólar
        if ($dolares == 0) {
            $html_precio_cabecera = 'Precio no disponible';
            $html_precio_cotizador = 'Precio no disponible';
        } else {
            $dolares = 'USD ' . number_format($dolares);
            $soles = 'S/ ' . number_format($soles);

            $html_precio_cabecera = 'Desde ' . $dolares . '(*) o ' . $soles . '(**)  ';
            $html_precio_cotizador = 'Desde ' . $dolares . '(*) o ' . $soles . '(**)';
            $texto_precio_anio = '(*) Versión básica Año Módelo ' . $precio_anio;
            $texto_cambioreferencial = '(**) TC 3.4 referencial sujeto a cambios por fluctuaciones de mercado.';
        }

        //Colores
        $html_color_auto = '';
        if ($color_auto != '') {
            $html_color_auto .= '<div class="col-md-12 text-left mt-30">';
            $html_color_auto .= '<p style="font-size:22px;color:#707276;">Colores</p>';
            $html_color_auto .= '<img src="' . $base_path . '/assets/modelos/colores/' . $color_auto . '" class="img-responsive"/>';
            $html_color_auto .= '</div>';
        }

        //Colores Techo
       // $html_techo= '';
        if ($color_techo != '') {
            $html_techo .= '<div class="col-md-12 text-left mt-30">';
            $html_techo .= '<p style="font-size:22px;color:#707276;">Colores de Techo</p>';
            $html_techo .= '<img src="' . $base_path . '/assets/modelos/colores/' . $color_techo . '" class="img-responsive"/>';
            $html_techo .= '</div>';
        }
        //Preventa
        if ($preventa == 'si') {
            $html_precio_cabecera = 'Precio Preventa: Desde ' . $dolares . ' <span style="color:#000;">/</span> ' . $soles;
            $html_precio_preventa = '*Sólo hasta el 15 de Junio.';
            $html_precio_preventa_cot = '**Precio Preventa: Sólo hasta el 15 de Junio.';
        }
}



function objeto_a_json($data)
{
    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    } else {
        return $data;
    }
}

// Llamadas a API 


// Modelos 

$urlModelo = 'https://cotizadorderco.com/models-brands/' . $alias;
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($cURLConnection, CURLOPT_URL, $urlModelo);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
$objModelos = curl_exec($cURLConnection);
$jsonModelos = objeto_a_json($objModelos);
//var_dump($phoneList);
if ($modelo == 'APV FURGON' || $modelo == 'APV VAN') {
    $modelo = 'APV';
}
curl_close($cURLConnection);
$arrayModelos = json_decode($jsonModelos, true);
$numModelos = count($arrayModelos);

// Versiones

$opcionVersiones = '';
for ($m = 0; $m < $numModelos; $m++) {
    if ($arrayModelos[$m]['name'] == $modelo) {
        $urlVersiones = 'https://cotizadorderco.com/version-brands/' . $arrayModelos[$m]['_id'];
        $cURLConnection2 = curl_init();
        curl_setopt($cURLConnection2, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($cURLConnection2, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($cURLConnection2, CURLOPT_URL, $urlVersiones);
        curl_setopt($cURLConnection2, CURLOPT_RETURNTRANSFER, true);
        $objVersiones = curl_exec($cURLConnection2);
        //var_dump($objVersiones);
        $jsonVersiones = objeto_a_json($objVersiones);
        curl_close($cURLConnection2);
        $arrayVersiones = json_decode($jsonVersiones, true);

        $numVersiones = count($arrayVersiones);
        for ($v = 0; $v < $numVersiones; $v++) {
            $opcionVersiones .= '<option value="' . $arrayVersiones[$v]['name'] . '" data-sap="' . $arrayVersiones[$v]['codigo_sap'] . '">' . $arrayVersiones[$v]['name'] . '</option>';
        }
    }
}

// Offices

$opcionOffice = '';
$html_lima = '';
$html_provincia = '';

if ($alias == 'suzuki' || $alias == 'mazda') {
    $tienda_model = new Tienda();
    $tienda_marca = $tienda_model->ejecutarSql("SELECT * FROM tiendas_derco WHERE estado='1'");
    // $tienda_marca_arr = explode(',', $tienda_marca);

    foreach ($tienda_marca as $tiendas) {
        foreach ($tiendas as $newTienda) {
            $tienda_marca_arr = explode(',', $newTienda['marca']);
            $search_array = array_search($marca_tienda, $tienda_marca_arr);
            if ($search_array !== false) {
                $codigo_sap = $newTienda['codigo_sap'];
                $codigo_distrito = $newTienda['codigo_distrito'];
                $tienda = $newTienda['tienda'];
                $direccion = $newTienda['direccion'];
                $provincia = $newTienda['provincia'];

                if ($provincia == 'LIMA') {
                    $html_lima .= '<option value="' . $codigo_sap . '" data-distrito="' . $codigo_distrito . '" data-provincia="' . $provincia . '" data-tienda="' . $tienda . '">' . $direccion . '</option>';
                } else {
                    $html_provincia .= '<option value="' . $codigo_sap . '" data-distrito="' . $codigo_distrito . '" data-provincia="' . $provincia . '" data-tienda="' . $tienda . '">' . $direccion . '</option>';
                }
            }
        }
    }

    //$numOffices = count($search_array);

} else {

    $urlOffice = 'https://cotizadorderco.com/offices-brands/' . $alias;
    $cURLConnection3 = curl_init();
    curl_setopt($cURLConnection3, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($cURLConnection3, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($cURLConnection3, CURLOPT_URL, $urlOffice);
    curl_setopt($cURLConnection3, CURLOPT_RETURNTRANSFER, true);
    $objoffices = curl_exec($cURLConnection3);
    $jsonOffices = objeto_a_json($objoffices);
    curl_close($cURLConnection3);
    $arrayOffices = json_decode($jsonOffices, true);
    $numOffices = count($arrayOffices);

    for ($i = 0; $i < $numOffices; $i++) {
        $codigo_sap = $arrayOffices[$i]['codigo_sap'];
        $distrito = $arrayOffices[$i]['district'];
        $tienda = $arrayOffices[$i]['name'];
        $direccion = $arrayOffices[$i]['address'];
        $provincia = $arrayOffices[$i]['department'];

        if ($provincia == 'Lima') {
            $html_lima .= '<option value="' . $codigo_sap . '" data-distrito="' . $distrito . '" data-provincia="' . $provincia . '" data-tienda="' . $tienda . '">' . $direccion . '</option>';
        } else {
            $html_provincia .= '<option value="' . $codigo_sap . '" data-distrito="' . $distrito . '" data-provincia="' . $provincia . '" data-tienda="' . $tienda . '">' . $direccion . '</option>';
        }
    }
}

// for production

?>

<head>
    <meta charset="UTF-8">
    <meta lang="es">
    <meta name="keywords" content="Portal de Crecimiento - Lindley">
    <link rel="shortcut icon" href="./app/img/favicon.png" type="image/x-icon">
    <meta name="description" content="Campaña Derco - Lindley">
    <title>Landing campaña derco</title>
    <meta name="content_type"  content="text/html;" http-equiv="content-type" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="../app/css/bootstrap.css" />
    <link rel="stylesheet" href="../app/fonts/stylesheet.css" />
    <link rel="stylesheet" href="../app/css/style.css" />
    <link rel="stylesheet" href="../app/css/style_modelo.css" />
    <link rel="stylesheet" href="../app/css/style_modelo_ingenia.css" />
    <link rel="stylesheet" type="text/css" href="https://derco.com.pe/globals/css/avada/avada-inline-2018.css?v=2">
    <script src="../app/js/jquery.js"></script>
    <script src="../app/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>


<div class="post-content">

    <div class="fusion-fullwidth fullwidth-box nonhundred-percent-fullwidth" style='background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-bottom:20px;'>
        <div class="fusion-builder-row fusion-row ">
            <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_1  fusion-one-full fusion-column-first fusion-column-last 1_1" style='margin-top:0px;margin-bottom:0px;'>
                <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
                    <div class="col-xs-6 col-md-6">
                        <img src="<?php echo $base_path; ?>/assets/img/<?php echo $logo; ?>" />
                    </div>
                    <div class="col-xs-6 col-md-6 text-right">
                        <div id="bt-cotizador" class="btn bt-realizacotizacion">
                            Realizar Cotización
                        </div>
                    </div>
                    <div class="fusion-clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="fusion-fullwidth fullwidth-box nonhundred-percent-fullwidth" style='background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-bottom:20px;'>
        <div class="fusion-builder-row fusion-row ">
            <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_1  fusion-one-full fusion-column-first fusion-column-last 1_1" style='margin-top:0px;margin-bottom:0px;'>
                <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
                    <div class="col-md-8 text-left">
                        <p class="titulo-modelo"><?php echo $modelo; ?></p>
                        <p class="titulo-precio"><?php echo $html_precio_cabecera; ?></p>
                        <p class="titulo-anio">
                           <!--  <?php echo $html_precio; ?>
                            <?php echo $html_precio_preventa; ?>
                            <?php echo $texto_precio_anio; ?> -->

                        </p>
                        <p class="titulo-anio">

                            <?php echo $texto_cambioreferencial; ?>
                        </p>
                        <img src="<?php echo $foto_principal; ?>" alt="alt=" <?php echo $alt_img; ?>"" class="img-responsive" />
                    </div>
                    <div class="col-md-4">
                        <!-- <div class="cuadro-propiedades cuadro-propiedades-movil text-center" style="padding-bottom: 20px;">
                            <--?php echo html_entity_decode($informacion_basica); --?>
                        </div> -->
                        <?php echo $html_color_auto; ?>
                    </div>

                    <?php echo $html_techo; ?>
                    <div class="fusion-clearfix"></div>
                    <p style="font-size: 13px;">(*) Imágenes de los vehículos son referenciales.
                        Para más información cotiza el vehículo y versión de tu preferencia y/o acércate a la tienda Dercocenter de tu preferencia. <a href="https://derco.com.pe/terminos-y-condiciones-de-la-web-empresas-derco/" target="_self">“Términos y Condiciones”</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?= $ficha_tecnicaBloque; ?>

    <div class="fusion-fullwidth fullwidth-box fusion-parallax-none hundred-percent-fullwidth" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;background-attachment:none;border-bottom: 1px solid #eee;">
        <div class="fusion-builder-row fusion-row ">
            <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_1  fusion-one-full fusion-column-first fusion-column-last 1_1" style="margin-top:0px;margin-bottom:0px;">
                <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
                    <div class="fusion-clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="fusion-fullwidth fullwidth-box fusion-parallax-none nonhundred-percent-fullwidth bg-light-gris" style="background-position: center center;background-repeat: no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;background-attachment:none;padding-top:40px; padding-bottom:40px;">
        <div class="fusion-builder-row fusion-row ">
            <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_1  fusion-one-full fusion-column-first fusion-column-last 1_1" style="margin-top:0px;margin-bottom:0px;">
                <div class="col-xs-12 col-sm-6 col-xs-offset-0 col-sm-offset-3">
                    <p>Ingresa tus datos en el formulario a continuación y recibirás en breves momentos una cotización del modelo de interés.</p>
                </div>

                <div class="form-datos">
                    <div class="col-xs-12">
                        <div id="frmcontactenos">
                            <div class="col-xs-12 col-sm-6 col-xs-offset-0 col-sm-offset-3 np espacio-inputs">
                                <div class="form-group" style="display:none;">
                                    <label>Marca:</label>
                                    <input type="text" id="marca" class="form-control form-style color-effect-2" name="marca" minlength="2" required disabled value="<?php echo $marca_sap; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Modelo:</label>
                                    <input type="text" id="modelo" class="form-control form-style" name="modelo" minlength="2" required disabled value="<?php echo $modelo; ?>">
                                </div>
                                <p id="opcmodelo" class="p-formstyle" style="opacity:0;">Seleccione un modelo</p>
                                <div class="form-group">
                                    <div class="col-xs-12 np">
                                        <label class="form-titulos">Versión</label>
                                        <select name="version" id="version" class="form-style form-control tamano-selected color-effect-10" aria-required="true" required>
                                            <option value="0" class="color-selected" selected="true" disabled="disabled">Seleccione su versión</option>
                                            <?php echo $opcionVersiones; ?>
                                        </select>
                                        <p id="opcversion" class="p-formstyle">Selecciona una opción</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-titulos">Nombres:</label>
                                    <input type="text" id="first_name" class="form-control form-style color-effect-2" name="first_name" minlength="2" placeholder="Ingrese sus nombres" required>
                                </div>
                                <p id="opcnombre" class="p-formstyle">Ingrese sus nombres correctamente</p>

                                <div class="form-group">
                                    <label class="form-titulos">Apellidos:</label>
                                    <input type="text" id="last_name" class="form-control form-style color-effect-3" name="last_name" minlength="2" placeholder="Ingrese sus apellidos" required>
                                </div>
                                <p id="opcapellido" class="p-formstyle">Ingrese sus apellidos correctamente</p>

                                <label class="form-titulos">Tipo de Documento:</label>
                                <div class="form-group">
                                    <select name="tipo_documento" id="tipo_documento" class="form-style form-control tamano-selected color-effect-4" aria-required="true" required>
                                        <option value="0" class="color-selected" selected="true" disabled="disabled">Seleccione tipo de documento</option>
                                        <option value="RUC">RUC</option>
                                        <option value="DNI">DNI</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="Carnet de Extranjería">Carnet de Extranjería</option>
                                    </select>
                                </div>
                                <p id="opctipodocumento" class="p-formstyle">Seleccione un tipo de documento</p>

                                <div class="form-group">
                                    <label class="form-titulos">Razón Social:</label>
                                    <input type="text" id="razon_social" class="form-control form-style color-effect-5" name="razon_social" minlength="2" placeholder="Ingrese su razón social" disabled>
                                </div>
                                <p id="opcrazonsocial" class="p-formstyle">Ingrese su razón social correctamente</p>

                                <div class="form-group">
                                    <label class="form-titulos">Número del Documento:</label>
                                    <input type="text" class="form-control form-style color-effect-6" name="rut_w2l" id="rut_w2l" minlength="8" maxlength="12" placeholder="Ingrese su número de documento" required disabled>
                                </div>
                                <p id="opcdni" class="p-formstyle">Ingrese un número de documento válido</p>

                                <div class="form-group">
                                    <label class="form-titulos">Celular:</label>
                                    <input type="text" class="form-control form-style color-effect-7" name="fone1_w2l" id="telefono" maxlength="9" placeholder="Ingrese su celular" required>
                                </div>
                                <p id="opctelefono" class="p-formstyle">Ingrese su celular correctamente</p>

                                <div class="form-group">
                                    <label class="form-titulos">Correo:</label>
                                    <input type="email" class="form-control form-style color-effect-8" name="email" id="correo" placeholder="Ingrese su correo" required>
                                </div>
                                <p id="opccorreo" class="p-formstyle">Ingrese su correo correctamente</p>

                                <div class="form-group">
                                    <label class="form-titulos">Tienda:</label>
                                    <select name="store" id="iSalon" class="form-style form-control tamano-selected color-effect-9" required>
                                        <option value="0" class="color-selected" selected="true" disabled="disabled">Seleccione una Tienda</option>
                                        <optgroup label="Lima">
                                            <?php echo $html_lima; ?></optgroup>
                                        <optgroup label="Provincias"><?php echo $html_provincia; ?></optgroup>
                                    </select>
                                </div>
                                <p id="opctienda" class="p-formstyle">Seleccione una tienda</p>

                                <div id="legales" class="col-xs-12 checkbox">
                                    <div class="col-xs-12">
                                        <input type="checkbox" name="clausula" value="Mis datos personales serán tratados conforme a la Cláusula Informativa que he leído."> Mis datos personales serán tratados conforme a la <a href="#" data-toggle="modal" data-target="#modalClausulas"> <b>Cláusula Informativa</b> </a> que he leído.
                                    </div>
                                    <br>

                                    <div class="col-xs-12" style="margin-top:15px;">
                                        Derco podrá enviarme información sobre promociones y ofertas comerciales de sus productos y servicios, conforme a la <a href="#" data-toggle="modal" data-target="#modalDatosPersonales"><b>Cláusula de Datos Personales</b> :</a>
                                    </div>


                                    <div class="col-xs-12">
                                        <input value="Si autorizo a Derco." name="aprobacionPersonales" type="radio">Si autorizo a Derco. <br>
                                    </div>
                                    <div class="col-xs-12">
                                        <input value="No autorizo, prefiero perder la oportunidad de recibir promociones y ofertas." name="aprobacionPersonales" type="radio">No autorizo, prefiero perder la oportunidad de recibir promociones y ofertas.
                                    </div>

                                    <p id="rpta2"></p>
                                </div>

                                <div class="col-xs-12 np espacio-inputs">
                                    <div class="g-recaptcha" data-sitekey="6LcSPHMUAAAAAKyelBnxNqPA4syjfTY1MDuSX7sD"></div>
                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                    <div id="rptacaptcha" class="small" style="color: #dc241f;display:none;">*Verifique el captcha.</div>
                                </div>

                                <div class="col-xs-12 text-center np espacio-inputs">
                                    <button type="submit" class="btn-send btn-block" id="EnviarForm">ENVIAR</button>
                                    <p id="rpta"></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="fusion-clearfix"></div>
            </div>
        </div>
    </div>

    <!-- Modal Legales de la Web -->
    <div class="modal fade" id="modalDatosPersonales" tabindex="-1" role="dialog" aria-labelledby="modalBases" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title style-titlemodal" id="exampleModalBases">LEGAL PARA COTIZAR</h5>
                    <button type="button" class=" close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="style-x">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <u>Cotización Web</u>
                    </div>
                    <br>
                    <div class="text-center">
                        <b>Cláusula de Datos Personales para Usos Adicionales </b>
                    </div>
                    <br>
                    <p>
                        De conformidad con lo dispuesto en la Ley 29733, Ley de Protección de Datos Personales y su Reglamento, aprobado mediante Decreto Supremo 3-2013-JUS, DERCO PERÚ S.A. (en adelante, “DERCO”) informa al USUARIO que los datos personales cuyo tratamiento autoriza a DERCO, a Dercocenter S.A.C. y Automotriz Latinoamericana S.A.C. (en adelante, las “Empresas”), así como aquellos datos que autorice en el futuro en el contexto de la generación de la presente cotización y/o simulación, serán incorporados en el banco de datos personales “Clientes de la empresa y reclamantes” de titularidad de DERCO. Este banco de datos personales ha sido inscrito en el Registro Nacional de Protección de Datos Personales con Código de Registro 6898. La dirección del titular del Banco es Av. Nicolás de Ayllón 2648, Ate, Lima.

                    </p>
                    <p>
                        EL USUARIO autoriza a DERCO a utilizar la Información a fin de que DERCO, de manera directa, o a través de sus Encargados y Terceras Empresas:
                    </p>
                    <p>

                        <li>
                            Atienda reclamos y/o solicitudes de El USUARIO respecto de los productos y/o servicios brindados por DERCO.
                        </li>
                        <li>
                            Le ofrezca productos y/o servicios vinculados o asociados a los productos y/o servicios automotrices de DERCO (venta de repuestos, accesorios y productos automotrices, venta de vehículos de las marcas de DERCO y servicios post-venta). El envío de estas comunicaciones o mensajes con las ofertas y/o anuncios publicitarios podrá ser remitida a través de medios escritos (por ejemplo, comunicaciones físicas), verbal (por ejemplo, mensajes o llamadas telefónicas) o electrónicos/informáticos (por ejemplo, correo electrónico, Whatsapp y Redes Sociales).
                        </li>
                        <li>
                            Realizar encuestas, evaluar niveles de satisfacción, Net Promoter Score, estudios de mercado, preferencias de los usuarios, invitaciones a eventos y campañas.
                        </li>

                    </p>
                    <p>

                        EL USUARIO autoriza expresamente a DERCO a actualizar y completar su Información accediendo a fuentes públicas y/o la información que el USUARIO nos provea en el futuro.

                    </p>
                    <p>
                        Asimismo, EL USUARIO reconoce haber sido informado que el tratamiento de sus datos por parte de DERCO, directamente o a través de las Terceras Empresas o Encargados, será hasta por un plazo de diez (10) años después de que finalice su relación comercial con DERCO.

                    </p>
                    <p>
                        Cabe precisar que, respecto a las Transferencias a Terceros y a Encargados y al ejercicio de los derechos ARCO se aplicarán al presente caso lo estipulado en la anterior Cláusula Informativa.

                        La aceptación o no de esta autorización para usos adicionales (ajenos a la ejecución de la relación contractual) no condiciona la prestación del servicio que EL USUARIO adquiere a través del contrato que está siendo suscrito.

                    </p>

                    <!--span class="excepcion-colormodal">Nota: </span>El envío de esta información implica que usted está aceptando los aspectos legales y políticas de privacidad de este sitio web. -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Clausulas de la Web -->
    <div class="modal fade" id="modalClausulas" tabindex="-1" role="dialog" aria-labelledby="modalBases" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title style-titlemodal" id="exampleModalBases">LEGAL PARA COTIZAR</h5>
                    <button type="button" class=" close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="style-x">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <u>Cláusula Informativa</u>
                    </div>
                    <br>
                    <br>
                    <p>
                        De conformidad con lo dispuesto en la Ley 29733, Ley de Protección de Datos Personales y su Reglamento, aprobado mediante Decreto Supremo 3-2013-JUS, DERCO PERÚ S.A. (en adelante, “DERCO”) informa al USUARIO que los datos personales cuyo tratamiento autoriza a DERCO, a Dercocenter S.A.C. y Automotriz Latinoamericana S.A.C. (en adelante, las “Empresas”), así como aquellos datos que autorice en el futuro en el contexto de la generación de la presente cotización y/o simulación, serán incorporados en el banco de datos personales “Clientes de la empresa y reclamantes” de titularidad de DERCO. Este banco de datos personales ha sido inscrito en el Registro Nacional de Protección de Datos Personales con Código de Registro 6898. La dirección del titular del Banco es Av. Nicolás de Ayllón 2648, Ate, Lima.
                    </p>
                    <p>
                        El USUARIO autoriza a DERCO a tratar sus datos personales con la finalidad de brindar un adecuado servicio derivado de la cotización que este envía, con la potencial finalidad de adquirir algún producto o servicio comercializado por las Empresas. La negativa del titular de proporcionar sus datos personales, genera la imposibilidad de ejecutar la relación comercial y/o una eventual relación contractual.
                    </p>
                    <p>
                        <b>Transferencias a Terceros y Encargados del tratamiento.-</b> <br>
                        EL USUARIO autoriza expresamente a DERCO a transferir su Información a terceras empresas (incluyendo pero no limitándose a aquellas que pertenecen al mismo grupo empresarial de DERCO), quienes podrán utilizar su Información para los usos y finalidades autorizados por EL USUARIO.
                    </p>
                    <p>
                        En virtud de lo señalado, el USUARIO autoriza expresamente a DERCO a dar tratamiento, procesar y transferir su información a sus empresas subsidiarias, grupo empresarial, concesionarios, afiliadas y socios comerciales listados en la página web de DERCO https://www.derco.com.pe (en adelante, las “Terceras Empresas”), ubicados en el Perú y en el extranjero, conforme a los procedimientos que DERCO determine en el marco de sus operaciones habituales.

                    </p>
                    <p>
                        EL USUARIO reconoce haber sido informado que su Información podrá ser conservada, tratada y transferida por DERCO a las Terceras Empresas hasta diez (10) años después de que finalice su relación comercial.
                    </p>
                    <p>
                        Asimismo, EL USUARIO reconoce que DERCO utilizará diversos encargados, ubicados en el Perú y en el extranjero, quienes realizarán los tratamientos por cuenta y beneficio de DERCO, los cuales se encuentran listados en la página web de DERCO https://www.derco.com.pe.

                    </p>
                    <p>
                        <b>Plazo de conservación.-</b> <br>

                        DERCO podrá utilizar la Información de EL USUARIO hasta diez (10) años después de que finalice su relación comercial.

                    </p>
                    <p>
                        <b>Ejercicio de derechos.-</b> <br>

                        EL USUARIO puede ejercer los derechos de acceso, rectificación, cancelación, revocación y oposición reconocidos por la Ley 29733 y su reglamento (o aquellas que las modifiquen o sustituyan).

                    </p>
                    <p>
                        Para ejercer cualquiera de los referidos derechos deberá remitir una comunicación a la siguiente dirección electrónica: derechosarco@derco.pe o ingresar a la sección denominada derechos ARCO en nuestra página web https://www.derco.com.pe.

                    </p>

                    <!--span class="excepcion-colormodal">Nota: </span>El envío de esta información implica que usted está aceptando los aspectos legales y políticas de privacidad de este sitio web. -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    var re = new RegExp("^[A-Za-záéíóúÁÉÍÓÚÑñ ]+$");
    var reruc = new RegExp("^[A-Za-záéíóúÁÉÍÓÚÑñ -.&0123456789]+$");
    //NOMBRES
    $("#first_name").keydown(function(e) {
        // Permite: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 32]) !== -1 ||
            // Permite: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Permite: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // solo permitir lo que no este dentro de estas condiciones es un return false
            return;
        }

        // Aseguramos que son letras
        if ((e.keyCode < 65 || (e.keyCode > 95 && e.keyCode < 106)) && ((e.keyCode > 122 || e.keyCode < 129) || (e.keyCode > 165 || e.keyCode < 181))) {
            e.preventDefault();
        }
    });

    $("#first_name").keyup(function(e) {
        var first_name = $(this).val();

        if (!re.test(first_name)) {
            $('#opcnombre').css('opacity', '1');
            $('.color-effect-2').css('border-color', '#FF1D25');
        } else {
            $('#opcnombre').css('opacity', '0');
            $('.color-effect-2').css('border-color', '#39B54A');
        }
    });

    //APELLIDOS
    $("#last_name").keydown(function(e) {
        // Permite: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 32]) !== -1 ||
            // Permite: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Permite: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // solo permitir lo que no este dentro de estas condiciones es un return false
            return;
        }

        // Aseguramos que son letras
        if ((e.keyCode < 65 || (e.keyCode > 95 && e.keyCode < 106)) && ((e.keyCode > 122 || e.keyCode < 129) || (e.keyCode > 165 || e.keyCode < 181))) {
            e.preventDefault();
        }
    });

    $("#last_name").keyup(function(e) {
        var last_name = $("#last_name").val();

        if (!re.test(last_name)) {
            $('#opcapellido').css('opacity', '1');
            $('.color-effect-3').css('border-color', '#FF1D25');
        } else if (last_name.length > 2) {
            $('#opcapellido').css('opacity', '0');
            $('.color-effect-3').css('border-color', '#39B54A');
        }
    });


    //TIPO DE DOCUMENTO
    $('select#tipo_documento').on('change', function() {
        $('#opcrazonsocial').css('opacity', '0');
        $('#opctipodocumento').css('opacity', '0');

        $('.color-effect-4').css('border-color', '#39B54A');
        $('.color-effect-5').css('border-color', '#ADADAD');
        $('#rut_w2l').css('border-color', '#ADADAD');

        $('#rut_w2l').val('');
        $("#razon_social").val('');

        document.getElementById("rut_w2l").disabled = false;

        if ($('#tipo_documento option:selected').val() == 'RUC') {
            document.getElementById("razon_social").disabled = false;
        } else {
            document.getElementById("razon_social").disabled = true;
        }
    });

    //RAZÓN SOCIAL
    $("#razon_social").keyup(function(e) {
        var razon_social = $("#razon_social").val();

        if (!reruc.test(razon_social)) {
            $('#opcrazonsocial').css('opacity', '1');
            $('.color-effect-5').css('border-color', '#FF1D25');
        } else if (razon_social.length > 2) {
            $('#opcrazonsocial').css('opacity', '0');
            $('.color-effect-5').css('border-color', '#39B54A');
        }

        // Permite: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 32]) !== -1 ||
            // Permite: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Permite: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // solo permitir lo que no este dentro de estas condiciones es un return false
            return;
        }
    });

    //NÚMERO DE DOCUMENTO
    $("#rut_w2l").keyup(function(e) {
        var numero_documento = $("#rut_w2l").val();
        var tipo_documento = $("#tipo_documento").val();
        var flag = false;
        //alert(tipo_documento);
        if (tipo_documento == 'DNI') {
            $("#rut_w2l").attr('maxlength', '8');
            $("tipoDocumento").attr('value', tipo_documento);

            if (numero_documento.length == 8) {
                flag = true;
            }
        } else if (tipo_documento == 'RUC') {
            $("#rut_w2l").attr('maxlength', '11');
            $("tipoDocumento").attr('value', tipo_documento);

            if (numero_documento.length == 11) {
                flag = true
            }
        } else if (tipo_documento == 'Pasaporte' || tipo_documento == 'Carnet de Extranjería') {
            $("#rut_w2l").attr('maxlength', '12');
            $("tipoDocumento").attr('value', tipo_documento);

            if (numero_documento.length == 12) {
                flag = true;
            }
        }

        if (flag) {
            $('#opcdni').css('opacity', '0');
            $('.color-effect-6').css('border-color', '#39B54A');
        } else {
            $('#opcdni').css('opacity', '1');
            $('.color-effect-6').css('border-color', '#FF1D25');
        }

        // Permite: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Permite: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Permite: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // solo permitir lo que no este dentro de estas condiciones es un return false
            return;
        }
        // Aseguramos que son numeros
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    //TELÉFONO
    $("#telefono").keyup(function(e) {
        var telefono = $("#telefono").val();

        if (!/^(9)\d{8}$/.test(telefono)) {
            $('#opctelefono').css('opacity', '1');
            $('.color-effect-7').css('border-color', '#FF1D25');
        } else if (telefono.length == 9) {
            $('#opctelefono').css('opacity', '0');
            $('.color-effect-7').css('border-color', '#39B54A');
        }

        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Permite: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Permite: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // solo permitir lo que no este dentro de estas condiciones es un return false
            return;
        }
        // Aseguramos que son numeros
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    //CORREO ELECTRÓNICO
    $("#correo").keyup(function(e) {
        var correo = $("#correo").val();

        if (validateEmail(correo)) {
            $('#opccorreo').css('opacity', '0');
            $('.color-effect-8').css('border-color', '#39B54A');
        } else {
            $('#opccorreo').css('opacity', '1');
            $('.color-effect-8').css('border-color', '#FF1D25');
        }
    });

    //Filtro de Selecciona version
    $("input[name='aprobacionPersonales']").click(function() {
        var datospersonales = $("input[name='aprobacionPersonales']:checked").val();

    });
    $("input[name='clausula']").click(function() {
        var terminoclausula = $("input[name='clausula']:checked").val();

    });

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    //Filtro de Selecciona version
    $('select#version').on('change', function() {
        var version = $(this).val();
        var codigosap = $('select#version option:checked').attr('data-sap');
        $('#opcversion').css('opacity', '0');
        $('.color-effect-10').css('border-color', '#39B54A');
        $("#aparecer").css('opacity', '1');
    });

    var contador = 0;

    //FILTRO DE TIENDAS
    $('select#iSalon').on('change', function() {
        tienda_val = $(this).val();
        $('#opctienda').css('opacity', '0');
        $('.color-effect-9').css('border-color', '#39B54A');
    });

    $("#EnviarForm").click(function(e) {

        $('#EnviarForm').prop('disabled', true);
        var marca = $('#marca').val();
        var marca_sf = marca;
        //Citroen
        if (marca == 'CITROËN') {
            marca_sf = 'CITROEN';
        }
        var modelo = $("#modelo").val();
        var nombre = $("#first_name").val();
        var version = $('select#version').val();
        var codigosap = $('select#version option:checked').attr('data-sap');
        var apellido = $("#last_name").val();
        var tipo_documento = $('#tipo_documento option:selected').val();
        var razon_social = $("#razon_social").val();
        var numero_documento = $("#rut_w2l").val();
        var telefono = $("#telefono").val();
        var correo = $("#correo").val();
        tienda_val = $("#iSalon option:selected").val();
        var tienda_direccion = $('#iSalon option:checked').text();
        var tienda_nombre = $('#iSalon option:checked').attr('data-tienda');
        var tienda_distrito = $('#iSalon option:checked').attr('data-distrito');
        var provincia = $('#iSalon option:checked').attr('data-provincia');
        var datospersonalesenvio = $("input[name='aprobacionPersonales']:checked").val();
        var terminos = $("input[name='clausula']:checked").val();
        var flag = true;

        //MODELO
        if (modelo == 0) {
            $('#opcmodelo').css('opacity', '1');
            $('.color-effect-1').css('border-color', '#FF1D25');
            flag = false;
        }

        if (version == null || version == '') {
            $('#opcversion').css('opacity', '1');
            $('.color-effect-10').css('border-color', '#FF1D25');
            flag = false;
        }

        //NOMBRE
        if (nombre.length < 2) {
            $('#opcnombre').css('opacity', '1');
            $('.color-effect-2').css('border-color', '#FF1D25');
            flag = false;
        }

        //APELLIDOS
        if (apellido.length < 1) {
            $('#opcapellido').css('opacity', '1');
            $('.color-effect-3').css('border-color', '#FF1D25');
            flag = false;
        }

        //TIPO DOCUMENTO
        if (tipo_documento == 0) {
            $('#opctipodocumento').css('opacity', '1');
            $('.color-effect-4').css('border-color', '#FF1D25');
            flag = false;
        }

        if (tipo_documento == 'RUC') {
            if (razon_social.length < 2) {
                $('#opcrazonsocial').css('opacity', '1');
                $('.color-effect-5').css('border-color', '#FF1D25');
                flag = false;
            }

            if (numero_documento.length < 11) {
                $('#opcdni').css('opacity', '1');
                $('.color-effect-6').css('border-color', '#FF1D25');
                flag = false;
            }
        }

        if (tipo_documento == 'DNI') {
            if (numero_documento.length < 8) {
                $('#opcdni').css('opacity', '1');
                $('.color-effect-6').css('border-color', '#FF1D25');
                flag = false;
            }
        }

        if (tipo_documento == 'Pasaporte' || tipo_documento == 'Carnet de Extranjería') {
            if (numero_documento.length < 12) {
                $('#opcdni').css('opacity', '1');
                $('.color-effect-6').css('border-color', '#FF1D25');
            }
        }

        //CELULAR
        if (!/^(9)\d{8}$/.test(telefono)) {
            $('#opctelefono').css('opacity', '1');
            $('.color-effect-7').css('border-color', '#FF1D25');
            flag = false;
        }

        //CORREO
        if (!validateEmail(correo)) {
            $('#opccorreo').css('opacity', '1');
            $('.color-effect-8').css('border-color', '#FF1D25');
            flag = false;
        }

        //TIENDA
        if (tienda_val == 0) {
            $('#opctienda').css('opacity', '1');
            $('.color-effect-9').css('border-color', '#FF1D25');
            flag = false;
        }

        //TÉRMINOS Y CONDICIONES
        if (terminos == undefined || datospersonalesenvio == undefined) {
            $("#rpta2").text("Debe seleccionar alguna de las opciones de nuestros Términos y condiciones.");
            flag = false;
        } else {
            $("#rpta2").text(" ");
            terminos = terminos + datospersonalesenvio;
        }

        //RE-CAPTCHA V2
        var captcha = 0;
        var response = grecaptcha.getResponse();

        if (response == 0) {
            //reCaptcha not verified
            captcha = 0;
        } else {
            //reCaptch verified
            captcha = 1;
        }

        if (captcha == 0) {
            $("#rptacaptcha").css('display', 'block');
            flag = false;
        }

        //VALIDACIONES
        if (!flag) {
            //Error en los datos del formulario
            $('#EnviarForm').prop('disabled', false);
            return false;
        } else {
            contador++;

            if (contador == 1) {
                /* ga('send', {
                    hitType: 'event',
                    eventCategory: 'Suscripcion',
                    eventAction: 'click boton',
                    eventLabel: '<?php echo strtoupper($marcaid) . " " . $modelo ?>'
                });
                */
                //Enviar datos para SalesForce

                post_data_cms = {
                    'id_w2l': 1,
                    'rut_w2l': numero_documento,
                    'first_name': nombre,
                    'last_name': apellido,
                    'fone1_w2l': telefono,
                    'tipo_documento': tipo_documento,
                    'razon_social': razon_social,
                    'email': correo,
                    'state': provincia,
                    'url1_w2l': 'https://derco.com.pe/catalogo-derco/',
                    'url2_w2l': 'https://derco.com.pe/',
                    'brand_w2l': 'DERCO',
                    'model_w2l': modelo,
                    'marca2': marca,
                    'version_w2l': version,
                    'sap_w2l': codigosap,
                    'price_w2l': '',
                    'local_w2l': tienda_nombre,
                    'distrito': tienda_distrito,
                    'direccion': tienda_direccion,
                    'cod_origen2_w2l': '001',
                    'store': tienda_val,
                    'terms': terminos
                }

                $.ajax({
                    url: "https://cotizadorderco.com/client",
                    type: "POST",
                    data: post_data_cms,
                    beforeSend: function(xhr, settings) {

                    },
                    success: function(data, status) {
                        post_data = {
                            'marca': marca_sf,
                            'modelo': modelo,
                            'first_name': nombre,
                            'last_name': apellido,
                            'tipo_documento': tipo_documento,
                            'razon_social': razon_social,
                            'version': version,
                            'codigosap': codigosap,
                            'numero_documento': numero_documento,
                            'celular': telefono,
                            'correo': correo,
                            'provincia': provincia,
                            'tienda': tienda_val,
                            'terminos': terminos
                        };

                        $.ajax({
                            type: "POST",
                            url: "send-data.php",
                            crossDomain: true,
                            data: post_data,
                            beforeSend: function(xhr, settings) {

                            },
                            success: function(data, status) {
                                //Ajax post data to E-MAIL
                                post_email_data = {
                                    'source': 'DERCO',
                                    'marca': marca,
                                    'modelo': modelo,
                                    'first_name': nombre,
                                    'last_name': apellido,
                                    'tipo_documento': tipo_documento,
                                    'razon_social': razon_social,
                                    'numero_documento': numero_documento,
                                    'celular': telefono,
                                    'correo': correo,
                                    'provincia': provincia,
                                    'tienda': tienda_val,
                                    'tienda_nombre': tienda_nombre,
                                    'terminos': terminos
                                };

                                //console.log(post_email_data);

                                $.ajax({
                                    type: "POST",
                                    url: "enviar-correo.php",
                                    crossDomain: true,
                                    data: post_email_data,
                                    beforeSend: function(xhr, settings) {

                                    },
                                    success: function(data, status) {
                                        post_analytics = {
                                            'source': 'DERCO',
                                            'marca': marca,
                                            'modelo': modelo,
                                            'version': version,
                                            'first_name': nombre,
                                            'last_name': apellido,
                                            'tipo_documento': tipo_documento,
                                            'razon_social': razon_social,
                                            'numero_documento': numero_documento,
                                            'celular': telefono,
                                            'correo': correo,
                                            'utm_source': '<?php echo $utm_source; ?>',
                                            'utm_medium': '<?php echo $utm_medium; ?>',
                                            'utm_campaign': '<?php echo $utm_campaign; ?>',
                                        };
                                        //  window.location.href="https://derco.com.pe/catalogo-derco/gracias.php?marca="+post_analytics.marca+"&modelo="+post_analytics.modelo+"&version="+post_analytics.version+"&first_name="+post_analytics.first_name+"&last_name="+post_analytics.last_name+"&tipo_documento="+post_analytics.tipo_documento+"&razon_social="+post_analytics.razon_social+"&numero_documento="+post_analytics.numero_documento+"&celular="+post_analytics.celular+"&correo="+post_analytics.correo+"&utm_source="+post_analytics.utm_source+"&utm_medium="+post_analytics.utm_medium+"&utm_campaign="+post_analytics.utm_campaign;
                                        window.location.href = "https://derco.com.pe";
                                    },
                                    error: function(jqXHR, exception, response) {
                                        console.log('Error correo');
                                    }
                                });

                            },
                            error: function(jqXHR, exception, response) {
                                console.log('Error salesforce');
                            }
                        });


                    },
                    error: function(jqXHR, exception, response) {

                    }
                });
            }
        }
    });
</script>

<script type="text/javascript">
	jQuery(document).ready(function()
	{
		jQuery(".HeaderTableModel").bind("click", function()
		{
			jQuery(".opencoll").fadeOut();
			jQuery(".uncollapseficha").removeClass("uncollapseficha");
			jQuery(this).addClass("uncollapseficha");

			jQuery(this).parent().next().fadeIn();
		});
		jQuery(".HeaderTableModel:first").trigger("click");

		if(jQuery(".fontSizeMovil:eq(2)").html().length > 2 && jQuery(".fontSizeMovil:eq(2)").html().length < 6)
		{
			jQuery(".fontSizeMovil:eq(2)").addClass("fontSizeThreeTransmision");
		}
		if(jQuery(".fontSizeMovil:eq(2)").html().length > 5)
		{
			jQuery(".fontSizeMovil:eq(2)").addClass("fontSizeThreeTransmision2");
		}

		if(jQuery(".fontSizeMovil:eq(0)").html().length > 3)
		{
			jQuery(".fontSizeMovil:eq(0)").addClass("fontSizeAros");
		}

		if(jQuery(".borderRightPC:eq(1) .fusion-row div:eq(2) span").html().length > 1 &&
		jQuery(".borderRightPC:eq(1) .fusion-row div:eq(2) span").html().length < 6
		)
		{
			jQuery(".borderRightPC:eq(1) .fusion-row div:eq(2) span").addClass("fontSizeMotor");
		}

		if(jQuery(".borderRightPC:eq(1) .fusion-row div:eq(2) span").html().length > 5)
		{
			jQuery(".borderRightPC:eq(1) .fusion-row div:eq(2) span").addClass("fontSizeMotor2");
		}

		jQuery(".cuadro-propiedades-movil").animate({opacity:1});

	});

	window.onload = function()
	{
		if(jQuery(window).width() < 768)
		{
			GetWidthTable = jQuery(".tabletecnicacr").outerWidth();
			jQuery(".tabletecnicacr").width(GetWidthTable);

		}
	}
</script>