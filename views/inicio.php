<div id="contenedor" class="container">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner col-12">
      <div class="carousel-item active">
        <img src="app/img/picture1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="app/img/picture2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="app/img/picture3.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="app/img/picture4.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="app/img/picture5.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="app/img/picture6.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="app/img/picture7.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="app/img/picture8.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <div class="row col-12 col-sm-12 col-md-4 bg-grayderco text-left mgTop bgTop">
    <p class="filtros-head">Filtros de Búsqueda</p>
  </div>
  <!--<div class="col-md-12 bg-derco">
    <div class="filtros-title text-center">
      <p class="filtros-title-white">MARCAS</p>
    </div>
    <div class="marcas-select text-center">
      <select name="marcas" id="buscar-marcas" class="p-2">
        <option value="todas">Todas las marcas</option>
        <option value="suzuki">Suzuki</option>
        <option value="renault">Renault</option>
        <option value="mazda">Mazda</option>
        <option value="citroen">Citroen</option>
        <option value="ds">DS</option>
        <option value="greatwall">Great Wall</option>
        <option value="haval">Haval</option>
        <option value="jac">Jac Motors</option>
        <option value="changan">Changan</option>
      </select>
    </div>
  </div>-->
  <div class="row col-12 text-center contInicioMd marg mgt ">
    <div class="col-12 col-sm-12 col-md-12 col-xl-4 text-center bg-white precioInputs">
      <div class="col-12 np espacioPregunta text-left pdTb">
        <h5 class="filtros-title-gray pdTb">PRECIO</h5>
      </div>
      <!--<div class="row">
        <div class="rango-precio">
            <label for="inputMin" class="col control-label">Desde $</label>
            <div class="col">
              <input type="text" class="form-control" id="inputMin" placeholder="Min." onkeypress="return isNumber(event)">
            </div>
        </div>
      </div>
      <div class="row">
        <div class="rango-precio">
            <label for="inputMax" class="col control-label">Hasta $</label>
            <div class="col">
              <input type="text" class="form-control" id="inputMax" placeholder="Max." onkeypress="return isNumber(event)">
            </div>
        </div>
      </div> -->
      <div class="min">
        <div class="rango-precio">
          <label for="inputMin" class="pdRight negrita">Desde $</label>
          <input type="text" class="text-center" id="inputMin" placeholder="Min." onkeypress="return insNumber(event)"></input>
        </div>
      </div>
      <div class="max">
        <div class="rango-precio">
          <label for="inputMin" class="pdRight negrita">Hasta $</label>
          <input type="text" class="text-center" id="inputMax" placeholder="Max." onkeypress="return insNumber(event)"></input>
        </div>
      </div>
    </div> 
    <div class="col-12 col-sm-12 col-md-12 col-xl-4 text center bg-gray centerInputs">
      <div class="col-md-12 bg-grayderco np espacioPregunta">
        <div class="filtros-title" id="titulo-modelos-filtro">
          <p class="filtros-title-gray">MODELOS</p>
        </div>
        <div id="hatchback" class="modelo-select marg">
          <i class="fa fa-angle-right" aria-hidden="true"></i> Hatchback
          <div class="checkbox-modelo"></div>
        </div>

        <div id="sedan" class="modelo-select">
          <i class="fa fa-angle-right" aria-hidden="true"></i> Sedán
          <div class="checkbox-modelo"></div>
        </div>

        <div id="suv" class="modelo-select">
          <i class="fa fa-angle-right" aria-hidden="true"></i> SUV
          <div class="checkbox-modelo"></div>
        </div>

        <div id="pickup" class="modelo-select">
          <i class="fa fa-angle-right" aria-hidden="true"></i> Pickup
          <div class="checkbox-modelo"></div>
        </div>

        <div id="multiproposito" class="modelo-select">
          <i class="fa fa-angle-right" aria-hidden="true"></i> Multipropósito
          <div class="checkbox-modelo"></div>
        </div>

        <div id="van" class="modelo-select">
          <i class="fa fa-angle-right" aria-hidden="true"></i> Van Pasajeros
          <div class="checkbox-modelo"></div>
        </div>

        <div id="panel" class="modelo-select">
          <i class="fa fa-angle-right" aria-hidden="true"></i> Panel
          <div class="checkbox-modelo"></div>
        </div>

        <div id="deportivos" class="modelo-select">
          <i class="fa fa-angle-right" aria-hidden="true"></i> Deportivos
          <div class="checkbox-modelo"></div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-xl-3">
      <div class="col-12 espacioBtns">
        <button id="btnModal" class="btnSeguir" type="button" name="button">
          BUSCAR
        </button>
      </div>
    </div>
    <!--<div class="col-md-12 bg-grayderco np espacioPregunta">
      <div class="filtros-title" id="titulo-modelos-filtro">
        <p class="filtros-title-gray">MODELOS</p>
      </div>
      <div id="hatchback" class="modelo-select marg">
        <i class="fa fa-angle-right" aria-hidden="true"></i> Hatchback
        <div class="checkbox-modelo"></div>
      </div>

      <div id="sedan" class="modelo-select">
        <i class="fa fa-angle-right" aria-hidden="true"></i> Sedán
        <div class="checkbox-modelo"></div>
      </div>

      <div id="suv" class="modelo-select">
        <i class="fa fa-angle-right" aria-hidden="true"></i> SUV
        <div class="checkbox-modelo"></div>
      </div>

      <div id="pickup" class="modelo-select">
        <i class="fa fa-angle-right" aria-hidden="true"></i> Pickup
        <div class="checkbox-modelo"></div>
      </div>

      <div id="multiproposito" class="modelo-select">
        <i class="fa fa-angle-right" aria-hidden="true"></i> Multipropósito
        <div class="checkbox-modelo"></div>
      </div>

      <div id="van" class="modelo-select">
        <i class="fa fa-angle-right" aria-hidden="true"></i> Van Pasajeros
        <div class="checkbox-modelo"></div>
      </div>

      <div id="panel" class="modelo-select">
        <i class="fa fa-angle-right" aria-hidden="true"></i> Panel
        <div class="checkbox-modelo"></div>
      </div>

      <div id="deportivos" class="modelo-select">
        <i class="fa fa-angle-right" aria-hidden="true"></i> Deportivos
        <div class="checkbox-modelo"></div>
      </div>
    </div>
    -->


    

    <!--<div class="row col-12 text-center">
      <div class="col-12 np espacioPregunta">
        <h2>¿Cúal es tu presupuesto?</h2>
      </div>
      <div class="col-12  col-md-2  col-lg-2  col-xl-2 text-content centerInputs">
        <label class="labelForm">MIN en $</label>
        <input class="inputForms" id="pres_min" type="text" required></input>
      </div>
      <div class="col-12  col-md-2  col-lg-2  col-xl-2 text-content centerInputs">
        <label class="labelForm">MAX en $</label>
        <input class="inputForms" id="pres_max" type="text" required></input>
      </div>

      <div class="col-12 espacioBtns">
        <button id="btnModal" class="btnSeguir" type="button" name="button">
          Confirmar
        </button>
      </div>
    </div> 
    -->
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
              <button id="user_data" class="btnSeguir">Siguiente</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function() {

      let min = '';
      let max = '';
      let marca = 'Todas las marcas';
      let tipo = 'todas';

      $("#pres_min").keydown(function(e) {
        // Permite: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
          // Permite: Ctrl+A
          (e.keyCode == 65 && e.ctrlKey === true) ||
          // Permite: home, end, left, right
          (e.keyCode >= 35 && e.keyCode <= 39)) {
          // solo permitir lo que no este dentro de estas condiciones es un return false
          return;
        }
        // Aseguramos que son numeros
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });
      $("#pres_max").keydown(function(e) {
        // Permite: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
          // Permite: Ctrl+A
          (e.keyCode == 65 && e.ctrlKey === true) ||
          // Permite: home, end, left, right
          (e.keyCode >= 35 && e.keyCode <= 39)) {
          // solo permitir lo que no este dentro de estas condiciones es un return false
          return;
        }
        // Aseguramos que son numeros
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });

      $("#pres_min").keyup(function() {
        minimo = $(this).val();
        $("#min").val(minimo);
      });

      $("#pres_max").keyup(function() {
        maximo = $(this).val();
        $("#max").val(maximo);
      });

      var buscar_modelo = [];
      $('.modelo-select').click(function() {

        if ($(this).hasClass('checkbox-modelo-selected-color')) {
          //Removemos del array de búsqueda por modelos
          var index = buscar_modelo.indexOf(this.id);

          if (index > -1) {
            buscar_modelo.splice(index, 1);
          }
        } else {
          //Agregamos al array de búsqueda por modelos
          buscar_modelo.push(this.id);
        }

        $(this).toggleClass('checkbox-modelo-selected-color');
        $(this).children('.checkbox-modelo').toggleClass('checkbox-modelo-selected');
        tipo = buscar_modelo;
      });

      $('#buscar-marcas').change(function() {
        marca = $('#buscar-marcas option:selected').val();
      })

      $('#btnModal').click(function() {
        $.ajax({
          url: 'filtro.php',
          type: 'POST',
          data: {
            max,
            min,
            marca,
            tipo
          },
          datatype: 'html',
          success: function(datahtml) {
            $('#contenedor').html(datahtml);
          },
          error: function() {
            $('#contenedor').html('<p>error al cargar desde Ajax</p>');
          }
        })
      })



    });
  </script>