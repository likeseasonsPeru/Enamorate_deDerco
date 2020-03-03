<div id="contenedor">
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
</div>



<script type="text/javascript">
    $(document).ready(function() {
        let pres_min;
        let pres_max;
        let email;
        let cell;
        $("#user_data").click(function() {
            pres_min = $("pres_min").val();
            pres_max = $('pres_max').val();
            email = $('user_email').val();
            cell = $('user_cell').val();

          /*   if (pres_min == null || pres_max == null || email == null || cell == null) {
                alert('Complete todos los campos');
            } else { */
                $.ajax({
                    url: 'views/perfiles.php',
                    type: 'POST',
                    data: {
                        pres_min,
                        pres_max,
                        email,
                        cell
                    },
                    datatype: 'html',
                    success: function(datahtml) {
                        console.log('Ok');
                        $('#contenedor').html(datahtml);
                    },
                    error: function() {
                        console.log('error');
                    }
                });
           // }



        })
    });
</script>