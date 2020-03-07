<?php
header('Access-Control-Allow-Origin: https://derco.com.pe');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
//header('Access-Control-Max-Age: 1000');
//header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// for dev
include_once dirname(__DIR__) . '../tableModel/user.php';

// for production
//include_once dirname(__FILE__).'../../tableModel/user.php';

if($_POST)
{
    //check if its an ajax request, exit if not
    /* if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

        $output = json_encode(array( //create JSON data
            'type'=>'error',
            'text' => 'Se debe enviar un AJAX POST'
        ));
        die($output); //exit script outputting json data
    } */

    date_default_timezone_set('America/Lima');

    //Sanitize input data using PHP filter_var().
    $oid = "00Df4000001QwLE";//oid de prueba="00D1b0000000mwq"; // Enviar por el excel
    $url_completa = 'https://derco.com.pe/catalogo-derco/';
    $url_corta = 'https://derco.com.pe';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento']; // DEBE VENIR CON EL (-)
    $razon_social = $_POST['razon_social'];

    $company = '';

    if($tipo_documento == 'RUC') {
      $company = $razon_social;
      $recordType = '012f4000000tW23';
    } else {
      $company = '';
      $recordType = '012f4000000tW24';
    }
    
    $telefono = '';
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];

    $lead_source = "Web";

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = '';

    $state = $_POST['provincia'];
    $local = $_POST['tienda']; //CÓDIGO SAP DE TIENDA
    $country = 'Perú';

    //Colocando el ID WEB
    //Ejemplo:CHANGAN == 0001
  /*  if($marca == 'CHANGAN'){
      $idweb = '0001';
    }else if($marca == 'CITROEN'){
      $idweb = '0002';
    }else if($marca == 'GREAT WALL'){
      $idweb = '0003';
    }else if($marca == 'HAVAL'){
      $idweb = '0004';
    }else if($marca == 'JAC'){
      $idweb = '0005';
    }else if($marca == 'MAZDA'){
      $idweb = '0006';
    }else if($marca == 'RENAULT'){
      $idweb = '0008';
    }else if($marca == 'SUZUKI'){
      $idweb = '0009';
    }*/
    $idweb = substr(date("YmdHisv"),0,-3);

    $currency = 'USD';
    $codigosap = $_POST['codigosap'];
    $version = $_POST['version']; //Versión modelo aún no definido porque no hay verisones (18.10.2018)

    $perfil = $_POST['perfil'];
    $pres_min = $_POST['pres_min'];
    $pres_max = $_POST['pres_max'];

     // ---------------------- guardado en base de datos ------------
    
     $user_model = new User($modelo, $version, $first_name, $last_name, $tipo_documento, $razon_social, $numero_documento, $celular, $correo, $local,  $perfil, $pres_min, $pres_max, $state);
     /* $query = "INSERT INTO registro_derco_oportunidades (nombres, apellidos, tipo_doc, razon, numero_doc, celular, correo, tienda, perfil, precio_min, precio_max, modelo, versio, provincia)
     VALUES('".$first_name."',
            '".$last_name."',
            '".$tipo_documento."',
            '".$razon_social."',
            '".$numero_documento."',
            '".$celular."',
            '".$correo."',
            '".$local."',
            '".$perfil."',
            '".$pres_min."',
            '".$pres_max."',
            '".$modelo."',
            '".$version."',
            '".$state."');"; */
     $saved = $user_model->save();
     

 //----------------------------------------------------------

    //Parche 31.07 largo 40 caracteres.
    $count_nombre = strlen($first_name);
    if($count_nombre > 40){ $first_name = substr($first_name, 0, 40);  }

    $count_apellido = strlen($last_name);
    if($count_apellido > 40){ $last_name = substr($last_name, 0, 40);  }

    //ENVÍO A SALESFORCE
    $ch = curl_init();
    // Cambio LFS 4-ago
    $variables = "&oid=$oid&00Nf400000O8bpY=$idweb&00Nf400000PNaMy=$tipo_documento&00Nf400000O8bq2=$numero_documento&first_name=$first_name&last_name=$last_name&mobile=$celular&email=$correo&state=$state&00Nf400000O8bpy=$url_completa&URL=$url_corta&00Nf400000O8bpc=$marca&00Nf400000O8bpf=$modelo&00Nf400000O8bq1=$version&00Nf400000O8bpC=$codigosap&00Nf400000O8bpn=$precio&00Nf400000O8boz=$local&lead_source=$lead_source&company=$company&country=$country&recordType=$recordType&currency=$currency";

    //$url_post =  "https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8";
    $url_post =  "https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8";

    curl_setopt($ch, CURLOPT_URL,$url_post);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$variables);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);

    $output = json_encode(array('type'=>'correcto'));

    die($output);
    
}
?>
