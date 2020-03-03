<div id="contenedor">
    <div class="col-12 text-center espacioTop">
      <h1>TENEMOS LO QUE NECESITAS</h1>
      <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h2>
      <div class="col-12 np espacioPregunta">
        <h2>¿Cúal es tu presupuesto?</h2>
      </div>
      <div class="col-12  col-md-2  col-lg-2  col-xl-2 text-content centerInputs">
          <label class="labelForm">MIN</label>
          <input class="inputForms" id="pres_min" type="text" required></input>
      </div>
      <div class="col-12  col-md-2  col-lg-2  col-xl-2 text-content centerInputs">
        <label class="labelForm">MAX</label>
        <input class="inputForms" id="pres_max" type="text" required></input>
      </div>

      <div class="col-12 espacioBtns">
        <button id="btnModal" class="btnSeguir" type="button" name="button">
          Confirmar
        </button>
      </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFirstDatos" tabindex="-1" role="dialog" aria-labelledby="modalFirstDatos" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Cuéntanos sobre ti</h3>
      </div>
      <div class="modal-body col-12">
        <form class="formStyle" action="segundo.php" method="post">
          <div class="text-content col-12 text-center">
              <label class="labelForm">Correo electrónico</label>
              <input class="inputForms" name="email" id="user_email" type="email" required></input>
              <label class="labelForm">Teléfono</label>
              <input class="inputForms" name="telefono" id="user_cell" type="tel"></input>
              <input id="min" type="hidden" name="min">
              <input id="max" type="hidden" name="max">
          </div>
          <div class="col-12 text-center">
              <button  id="user_data" class="btnSeguir">Siguiente</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
    $(document).ready(function(){

    });


    $(document).ready(function() {
        let pres_min;
        let pres_max;
        let email;
        let cell;
        let primerpaso = true;


        $("#btnModal").click(function(){

          console.log('Min:' + $("#pres_min").val());
          console.log('Max:' + $("#pres_max").val());
          if(!$("#pres_min").val() || $("#pres_min").val() == ''){
            console.log('Entre');
            primerpaso=false;
          }else if(!$("#pres_max").val()){
            primerpaso=false;
          }else{
            $('#modalFirstDatos').modal({
              'keyboard':false,
              'backdrop':false,
              'focus': true,
              'show': true,
              'backdrop': false,
            });
          }
        });

        if(primerpaso){
          $("#user_data").click(function(e) {
            e.preventDefauñt();
              pres_min = $("#min").val();
              pres_max = $("#max").val();
              email = $("#user_email").val();
              cell = $("#user_cell").val();
          });
        }


        $("#pres_min").keyup(function(){
          let minimo = $(this).val();
          $("#min").val(minimo);
        });

        $("#pres_max").keyup(function(){
          let maximo = $(this).val();
          $("#max").val(maximo);
        });



    });
</script>
