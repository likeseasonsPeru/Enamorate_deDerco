<?php
$minimo = $_POST['min'];
$maximo = $_POST['max'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

?>



<div class="contenedor">
  <div class="container">
    <div class="row">
      <div class="col-12 espacioTop">
        <div class="col-12 text-center espacioPregunta">
          <h1>¿Como te consideras?</h1>
          <h3>Selecciona una de estas opciones y estarás mas cerca del auto soñado</h3>
        </div>
        <div class="row text-center">
          <div class="col-12 col-md-3 col-lg-3 col-xl-3 ">
            <button id='btnEsforzado' class="btnTipoSelect" type="button" name="button">
              <img class="imgTipo" src="app/img/tipo1.png" alt="">
              <h2>ESFORZADO</h2>
            </button>
          </div>
          <div class="col-12 col-md-3 col-lg-3 col-xl-3">
            <button id='btnFamilion' class="btnTipoSelect" type="button" name="button">
              <img class="imgTipo" src="app/img/tipo2.png" alt="">
              <h2>FAMILIÓN</h2>
            </button>

          </div>
          <div class="col-12 col-md-3 col-lg-3 col-xl-3">
            <button id='btnEmprendedor' class="btnTipoSelect" type="button" name="button">
              <img class="imgTipo" src="app/img/tipo3.png" alt="">
              <h2>EMPRENDEDOR</h2>
            </button>

          </div>
          <div class="col-12 col-md-3 col-lg-3 col-xl-3">
            <button id='btnNuevoadulto' class="btnTipoSelect" type="button" name="button">
              <img class="imgTipo" src="app/img/tipo4.png" alt="">
              <h2>NUEVO ADULTO</h2>
            </button>
          </div>
        </div>
        <div class="col-12 espacioBtns text-center">
          <button class="btnSeguir" type="button" name="button">
            SIGUIENTE
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  $(document).ready(function() {
    var perfil = '';
    $('#btnEsforzado').click(function() {
      perfil = 'esforzado';
    });

    $('#btnFamilion').click(function() {
      perfil = 'familion';
    });

    $('#btnEmprendedor').click(function() {
      perfil = 'emprendedor';
    });

    $('#btnNuevoadulto').click(function() {
      perfil = 'nuevoadulto';

    });


    $('.btnSeguir').click(function() {

      let min = <?php echo $minimo; ?>;
      let max = <?php echo $maximo; ?>;
      let email = '<?php echo $email; ?>';
      let telefono = <?php echo $telefono; ?>;

      if (perfil == '') {
        alert('Seleccione un perfil');
      } else {
        $.ajax({
          url: 'filtro.php',
          type: 'POST',
          data: {
            min,
            max,
            email,
            telefono,
            perfil
          },
          datatype: 'html',
          success: function(datahtml) {
            $('.contenedor').html(datahtml);
          },
          error: function() {
            console.log('Algo salió mal');
          }

        })
      }
    })
  }) 

</script>