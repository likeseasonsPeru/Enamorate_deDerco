<div class="fusion-header border-top border-bottom bg-white" style="height: 117px; overflow: visible; top: 0px;">
    <div class="fusion-row" style="padding-top: 0px; padding-bottom: 0px;">
        <div class="fusion-logo" data-margin-top="0px" data-margin-bottom="0px" style="margin-top: 0px; margin-bottom: 0px;">
            <a class="fusion-logo-link" href="https://derco.com.pe">
                <!--img src="https://derco.com.pe/wp-content/uploads/2017/06/logo-mobile.jpg" srcset="https://derco.com.pe/wp-content/uploads/2017/06/logo-mobile.jpg 1x, https://derco.com.pe/wp-content/uploads/2017/06/logo-mobile-retina.jpg 2x" width="60" height="60" style="max-height:60px;height:auto;" alt="DERCO PERÚ | Respalda y Garantiza Logo" retina_logo_url="https://derco.com.pe/wp-content/uploads/2017/06/logo-mobile-retina.jpg" class="fusion-mobile-logo"-->
                <img src="https://derco.com.pe/wp-content/uploads/2016/09/Derco.gif" srcset="https://derco.com.pe/wp-content/uploads/2016/09/Derco.gif 1x, https://derco.com.pe/wp-content/uploads/2016/09/Derco-retina.gif 2x" width="116" height="116" style="max-height: 116px; height: 116px;" alt="DERCO PERÚ | Respalda y Garantiza Logo" retina_logo_url="https://derco.com.pe/wp-content/uploads/2016/09/Derco-retina.gif" class="fusion-standard-logo lazyloading" data-logo-width="116">
              </a>
        </div>
    </div>
</div>
<div id="contenedor" class="container">
  <div class="row col-6">
    <img src="app/img/Banner-landing.jpg" class="img-banner">
  </div>

  <div class="contenedor-principal">
    <div class="row filtro-container">
      <div class="col-12 col-sm-12 col-md-12 bg-grayderco2 text-center bgTop">
        <p class="filtros-head">FILTROS DE BUSQUEDA</p>
      </div>
    </div>

  <div class="row text-center mgt">
    <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 text-center marginSeccion">
      <div class="col-12 np espacioPregunta pdTb">
        <h5 class="filtros-title-white">PRECIO</h5>
      </div>

      <div class="min">
        <div class="marginEspacioPrecios">
          <div for="inputMin" class="pdRight negrita text-white col-12">Desde $</div>
          <input type="text" class="text-center inputPrecios " maxlength="6" id="inputMin" placeholder="Ingrese su rango" onkeypress="return insNumber(event)" style="
    border-radius: 25px;"></input>
        </div>
      </div>
      <div class="max">
        <div class="marginEspacioPrecios">
          <div for="inputMin" class="pdRight negrita text-white">Hasta $</div>
          <input type="text" class="text-center inputPrecios " maxlength="6" id="inputMax" placeholder="Ingrese su rango" onkeypress="return insNumber(event)" style="
    border-radius: 25px;"></input>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-12 col-md-6 col-xl-4 text-center marginTopCategorias">
      <div class="col-md-12 ">
        <div class="filtros-title">
          <p class="filtros-title-white">Categorias</p>
        </div>
        <div class="marcas-select">
          <select class="selectCategorias" name="marcas" id="buscar-categorias" class="col-12">
            <!-- <option value="todas">Todos</option> -->
            <option  selected="true" disabled="disabled" >Seleccione su categoría </option>
            <option value="emprendedor">Comerciales (Vans/Pick Up/Taxi)</option>
            <option value="familion">Autos Familiares</option>
            <option value="nuevo adulto">Estilo de vida</option>
            <option value="esforzado">Mi primer auto</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-3">
      <div class="col-12 espacioBtns">
        <button id="btnModal" class="btnSeguir2 "type="button" name="button">
          BUSCAR
        </button>
      </div>
    </div>
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
              <button id="user_data" class="btnSeguir">Siguiente</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function() {
      let perfil = 'emprendedor';
      let min = '';
      let max = '';
      let marca = 'Todas las marcas';
      let tipo = 'todas';

      $("#inputMin").keydown(function(e) {
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
      $("#inputMax").keydown(function(e) {
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

      $("#inputMin").keyup(function() {
        min = $(this).val();
        $("#inputMin").val(minimo);
      });

      $("#inputMax").keyup(function() {
        max = $(this).val();
        $("#inputMax").val(maximo);
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

     /*  $('#buscar-marcas').change(function() {
        marca = $('#buscar-marcas option:selected').val();
      } */

      $('#buscar-categorias').change(function() {
        perfil = $('#buscar-categorias option:selected').val();
      })

      $('#btnModal').click(function() {
        $.ajax({
          url: 'filtro.php',
          type: 'POST',
          data: {
            perfil,
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
