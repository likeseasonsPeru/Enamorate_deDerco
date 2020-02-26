<?php

function objeto_a_json($data) {
    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
    }

  $urlModelo='https://cotizadorderco.com/models-brands/'.$alias;
  //echo $alias;
  $objModelos = file_get_contents($urlModelo);
  if($modelo == 'APV FURGON' || $modelo == 'APV VAN'){
    $modelo = 'APV';
  }
  $jsonModelos = objeto_a_json($objModelos);
  $arrayModelos = json_decode($jsonModelos, true);
  $numModelos = count($arrayModelos);
  for($m=0;$m<$numModelos;$m++){
    if($arrayModelos[$m]['name'] == $modelo){
        $urlVersiones='https://cotizadorderco.com/version-brands/'.$arrayModelos[$m]['_id'];
        $objVersiones = file_get_contents($urlVersiones);
        $jsonVersiones = objeto_a_json($objVersiones);
        $arrayVersiones = json_decode($jsonVersiones, true);
        $numVersiones = count($arrayVersiones);
        for($v=0;$v<$numVersiones;$v++){
          $opcionVersiones .='<option value="'.$arrayVersiones[$v]['name'].'" data-sap="'.$arrayVersiones[$v]['codigo_sap'].'">'.$arrayVersiones[$v]['name'].'</option>';
        }
    }
  }

?>

<head>
    <meta charset="UTF-8">
    <meta lang="es">
    <meta name="keywords" content="Portal de Crecimiento - Lindley">
    <link rel="shortcut icon" href="./app/img/favicon.png" type="image/x-icon">
    <meta name="description" content="Portal de Crecimiento - Lindley">
    <title>Landing Natura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="../app/css/bootstrap.css" />
    <link rel="stylesheet" href="../app/fonts/stylesheet.css" />
    <link rel="stylesheet" href="../app/css/style.css" />
    <script src="app/js/jquery.js"></script>
    <script src="app/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>



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