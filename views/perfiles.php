<?php

$pres_min = $_POST['pres_min'];
$pres_max = $_POST['pres_max'];
$email = $_POST['email'];
$cell = $_POST['cell'];

?>

<section class="col-12">
    <div id="contenedor">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Tenemos lo que necesitas</h1>
                    <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h2>
                    <h3>¿Qué tipo de auto prefieres?</h3>
                </div>
            </div>
            <div class="row marg">
                <div class="col-12 col-md-6 col-lg-3"><img src="app/img/3sporthome.jpg" class="ig" id="uno"></div>
                <div class="col-12 col-md-6 col-lg-3"><img src="app/img/3sporthome.jpg" class="ig" id="dos"></div>
                <div class="col-12 col-md-6 col-lg-3"><img src="app/img/3sporthome.jpg" class="ig" id="tres"></div>
                <div class="col-12 col-md-6 col-lg-3"><img src="app/img/3sporthome.jpg" class="ig" id="cuatro"></div>
            </div>
        </div>
    </div>

</section>
<div class="text-center padin marg">
    <a class="col-12 fk-btn " href="segundo.php" id="sgBtn">Descubre tu auto</a>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var perfil = '';
        $('#uno').click(function() {
            perfil = 'esforzado';
            console.log(perfil);
        })

        $('#dos').click(function() {
            perfil = 'familión';
            console.log(perfil);
        })

        $('#tres').click(function() {
            perfil = 'emprendedor';
            console.log(perfil);
        })

        $('#cuatro').click(function() {
            perfil = 'nuevo adulto';
            console.log(perfil);
        })


        $('#sgBtn').click(function() {
            if (perfil != '') {
                let pres_min = <?php echo $pres_min ?>;
                let pres_max = <?php echo $pres_max ?>;
                let email = <?php echo $email ?>;
                let cell = <?php echo $cell ?>;

                $.ajax({
                    url: 'views/filtro.php',
                    type: 'POST',
                    data: {
                        pres_min,
                        pres_max,
                        email,
                        cell,
                        perfil
                    },
                    datatype: 'html',
                    success: function() {
                        console.log('Todo bien')
                    },
                    error: function() {
                        console.log('Algo salió mal');
                    }

                })
            } else {
                alert('Seleccione algun perfil');
            }
        })
    })
</script>