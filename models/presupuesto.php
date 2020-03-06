<?php

require_once '../tableModel/user.php';

$perfil = $_POST['perfil'];

if ($perfil == null){
    $perfil = '';
}

?>

<div class="col-12 text-center">
    <h1>TENEMOS LO QUE NECESITAS</h1>
    <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h2>
    <h3>¿Qué tipo de auto prefieres?</h3>
    <h2>¿Cúal es tu presupuesto?</h2>
    <div class="text-content">
        <label>MIN</label>
        <input id='pres_min' type="text"></input>
        <label>MAX</label>
        <input id='pres_max' type="text"></input>
    </div>
    <h2>Cuéntanos sobre ti</h2>
    <div class="text-content">
        <label>email</label>
        <input id='user_email' type="text"></input>
        <label>telefono</label>
        <input id='user_cell' type="text"></input>
    </div>
    <div class="marg">
        <button id='user_data' class="col-12 fk-btn">Siguiente</button>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        let pres_min;
        let pres_max;
        let email;
        let telefono;
        let perfil = <?php echo $perfil?>
        $("#user_data").click(function() {
            pres_min = $("pres_min").val();
            pres_max = $('pres_max').val();
            email = $('user_email').val();
            telefono = $('user_cell').val();
            $.ajax({
                url: '.php',
                type: 'POST',
                data: {
                    pres_min, pres_max, email, telefono, perfil
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

        })


    });
</script>