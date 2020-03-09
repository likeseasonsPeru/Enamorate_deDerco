<?php

if($_POST)
{

    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $tipo_documento = $_POST["tipo_documento"];
    $razon_social = $_POST["razon_social"];
    $version = $_POST["version"];
    $codigosap = $_POST["codigosap"];
    $numero_documento= $_POST["numero_documento"];
    $celular = $_POST["celular"];
    $correo = $_POST["correo"];
    $provincia = $_POST["provincia"];
    $tienda = $_POST["tienda"];
    $terminos = $_POST["terminos"];


    
      //EMAIL
      //$to = 'armando@sabor.pe';
      //$to = 'dercolead@gacsa.pe';
      $to = 'ullauri.jeanalex@gmail.com';
      //$to = 'wmunozarellano@gmail.com';
      $subject = '25 Días de Locura';

      $headers = "From: noreply@dercoperu.net\r\n";
      //$headers .= "Reply-To: ". strip_tags($_POST["txtCorreo"]) . "\r\n";
      //$headers .= "CC: susan@example.com\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      $message = '<html><body>';
      $message .= '<p>DATOS DEL CLIENTE:<br>';
      $message .= 'Marca: ' .$marca .'<br>';
      $message .= 'Modelo: ' .$modelo .'<br>';
      $message .= 'Version: ' .$version .'<br>';
      $message .= 'Codigo SAP: ' .$codigosap.'<br>';
      $message .= 'Nombres y Apellidos: ' .$first_name .' '.$last_name.'<br>';
      $message .= 'Tipo de Documento: ' .$tipo_documento .'<br>';
      $message .= 'Nro de Documento: ' .$numero_documento .'<br>';
      $message .= 'Razon Social: ' .$razon_social .'<br>';
      $message .= 'Celular: ' .$celular .'<br>';
      $message .= 'Correo: ' .$correo .'<br>';
      $message .= 'Provincia: '.$provincia.'<br>';
      $message .= 'Tienda: ' .$tienda .'<br>';
      $message .= 'Terminos y Condiciones: ' .$terminos.'<br>';
      $message .= '</p>';
      $message .= '</body></html>';

     // mail($to, $subject, $message, $headers);

}
?>
