<?php

$perfil = $_POST['perfil'];
$session_id = $_POST['session'];
$pres_min = $_POST['min'];
$pres_max = $_POST['max'];
$email = $_POST['email'];
$cell = $_POST['cell'];


if ($perfil != null && $email != null && $pres_min != null && $pres_max != null && $email != null && $cell != null) {
    $user_model = new User();
    $user =  $user_model->getBy('sessionid', $session_id);

    if ($user != null) {
        $user_model->setsession($session_id);
        $user_model->setpres_min($pres_min);
        $user_model->setpres_max($pres_max);
        $user_model->setEmail($email);
        $user_model->setcell($cell);
        $user_model->save();
    }
} else {
    
}


?>

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