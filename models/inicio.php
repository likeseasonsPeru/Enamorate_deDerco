<section class="col-12">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Tenemos lo que necesitas</h1>
                <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h2>
                <h3>¿Qué tipo de auto prefieres?</h3>
            </div>
        </div>
        <div class="row marg">
            <div class="col-12 col-lg-4"><img src="app/img/3sporthome.jpg"></div>
            <div class="col-12 col-lg-4"><img src="app/img/3sporthome.jpg"></div>
            <div class="col-12 col-lg-4"><img src="app/img/3sporthome.jpg"></div>
        </div>
    </div>
</section>
<div class="text-center padin marg">
    <button id="btn-enviar" class="col-12 fk-btn" type="button" name="button" value="1">Descubre tu auto</button>
</div>

<script type="text/javascript">

    $(document).ready(function() {
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

            $('#inicioBtn').click(function() {
                if (perfil) {
                    $.ajax({
                        url: 'segundo.php',
                        type: 'POST',
                        data: perfil,
                        datatype: 'html',
                        success: function() {
                            console.log('Todo bien')
                        },
                        error: function() {
                            console.log('Algo salió mal');
                        }
                    })
                } else {
                    alert('Seleccione alguna imagen');
                }
            })



        })


    });
</script>