<?php

$flag = false;
$filtro = 'motos'


?>

<script type="text/javascript">
  var flag = <?php echo $flag; ?>

  if (flag == true) {
    var perfil = '<?php echo $perfil; ?>';
    var max = parseInt('<?php echo $max; ?>');
    var min = parseInt('<?php echo $min; ?>');
    let marca = 'Todas las marcas';
    let tipo = 'todas';
    $(document).ready(function() {
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
  }
</script>

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
    <!-- Filtro para autos -->
    <?php if ($filtro == 'autos') { ?>

      <form id="formfilter" action="" method="POST">
        <div class="row text-center mgt">
          <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 text-center marginSeccion">
            <div class="col-12 np espacioPregunta pdTb">
              <h5 class="filtros-title-white">PRECIO</h5>
            </div>

            <div class="min">
              <div class="marginEspacioPrecios">
                <div for="inputMin" class="pdRight negrita text-white col-12">Desde $</div>
                <input type="text" name="min" class="text-center inputPrecios " maxlength="6" id="inputMin" placeholder="Ingrese su rango" onkeypress="return insNumber(event)" style="
                  border-radius: 25px;"></input>
              </div>
            </div>
            <div class="max">
              <div class="marginEspacioPrecios">
                <div for="inputMin" class="pdRight negrita text-white col-12">Hasta $</div>
                <input type="text" name='max' class="text-center inputPrecios " maxlength="6" id="inputMax" placeholder="Ingrese su rango" onkeypress="return insNumber(event)" style="
                  border-radius: 25px;"></input>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-xl-4 text-center marginTopCategorias">
            <div class="col-md-12 ">
              <div id="filtros-perfil" class="filtros-title">
                <!-- <p class="filtros-title-white">Categorias</p> -->
                <h5 class="filtros-title-white">Categorias</h5>
              </div>

              <!-- <div class="marcas-select">
                              <select class="selectCategorias text-center" name="perfil" id="buscar-categorias" class="col-12"> -->
              <!-- <option value="todas">Todos</option> -->
              <!-- <option selected="true" disabled="disabled">Seleccione su categoría</option>
                                <option value="emprendedor">Comerciales (Vans/Pick Up/Taxi)</option>
                                <option value="familion">Autos Familiares</option>
                                <option value="nuevo-adulto">Estilo de vida</option>
                                <option value="Pituco">Pituco</option>
                                <option value="Padre de Familia">Padre de Familia</option>
                                <option value="Aspiracional">Aspiracional</option>
                              </select>
                            </div> -->

              <input type="hidden" id='perfiles' name="perfil" value="todos">

              <div id="select-perfiles" class="col-md-12 bg-grayderco">
                <div id="emprendedor" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Trabajo (Taxi, Van,Pick Up, Furgon)
                  <div class="checkbox-modelo"></div>
                </div>

                <div id="familion" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Vans
                  <div class="checkbox-modelo"></div>
                </div>


                <!-- <div id="nuevo-adulto" class="modelo-select">
                              <i class="fa fa-angle-right" aria-hidden="true"></i> Estilo de vida
                              <div class="checkbox-modelo"></div>
                            </div>

                            <div id="Pituco" class="modelo-select">
                              <i class="fa fa-angle-right" aria-hidden="true"></i> Pituco
                              <div class="checkbox-modelo"></div>
                            </div>


                            <div id="Aspiracional" class="modelo-select">
                              <i class="fa fa-angle-right" aria-hidden="true"></i> Aspiracional
                              <div class="checkbox-modelo"></div>
                            </div> -->

                <div id="Diseño & Confort" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Diseño & Confort
                  <div class="checkbox-modelo"></div>
                </div>



                <div id="esforzado" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Mi primer auto
                  <div class="checkbox-modelo"></div>
                </div>

                <div id="Padre de Familia" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Familia
                  <div class="checkbox-modelo"></div>
                </div>
              </div>
            </div>

            <!---------------------------------- Marcas -------------------------->

            <input type="hidden" id='marcas' name="marcas" value="todos">

            <div class="col-md-12 my-2">
              <div id="filtros-marca" class="filtros-title">
                <!-- <p class="filtros-title-white">Categorias</p> -->
                <h5 class="filtros-title-white">Marcas</h5>
              </div>


              <div id="select-marcas" class="col-md-12 bg-grayderco">
                <div id="Suzuki" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Suzuki
                  <div class="checkbox-marca"></div>
                </div>

                <div id="Renault" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Renault
                  <div class="checkbox-marca"></div>
                </div>

                <div id="Mazda" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Mazda
                  <div class="checkbox-marca"></div>
                </div>

                <div id="Citroën" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Citroën
                  <div class="checkbox-marca"></div>
                </div>
                <!-- <div id="DS" class="modelo-select">
                              <i class="fa fa-angle-right" aria-hidden="true"></i> DS
                              <div class="checkbox-modelo"></div>
                            </div> -->
                <div id="Great Wall" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Great Wall
                  <div class="checkbox-marca"></div>
                </div>

                <div id="Haval" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Haval
                  <div class="checkbox-marca"></div>
                </div>
                <div id="Jac" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Jac Motors
                  <div class="checkbox-marca"></div>
                </div>
                <div id="Changan" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Changan
                  <div class="checkbox-marca"></div>
                </div>
              </div>

            </div>

          </div>
          <div class="col-12 col-sm-12 col-md-12 col-xl-3">
            <div class="col-12 espacioBtns">
              <button id="btnBuscar" class="btnSeguir2 " type="button" name="button">
                BUSCAR
              </button>
            </div>
          </div>
        </div>
      </form>

    <?php } else if ($filtro == 'camiones') { ?>

      <!-- Filtro para autos -->

      <form id="formfilter" action="" method="POST">
        <div class="row text-center mgt">
          <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 text-center marginSeccion">
            <div class="col-12 np espacioPregunta pdTb">
              <h5 class="filtros-title-white">PRECIO</h5>
            </div>

            <div class="min">
              <div class="marginEspacioPrecios">
                <div for="inputMin" class="pdRight negrita text-white col-12">Desde $</div>
                <input type="text" name="min" class="text-center inputPrecios " maxlength="6" id="inputMin" placeholder="Ingrese su rango" onkeypress="return insNumber(event)" style="
                  border-radius: 25px;"></input>
              </div>
            </div>
            <div class="max">
              <div class="marginEspacioPrecios">
                <div for="inputMin" class="pdRight negrita text-white col-12">Hasta $</div>
                <input type="text" name='max' class="text-center inputPrecios " maxlength="6" id="inputMax" placeholder="Ingrese su rango" onkeypress="return insNumber(event)" style="
                  border-radius: 25px;"></input>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-xl-4 text-center marginTopCategorias">
            <div class="col-md-12 ">
              <div id="filtros-perfil" class="filtros-title">
                <!-- <p class="filtros-title-white">Categorias</p> -->
                <h5 class="filtros-title-white">Categorias</h5>
              </div>

              <input type="hidden" id='perfiles' name="perfil" value="todos">

              <div id="select-perfiles" class="col-md-12 bg-grayderco">
                <div id="livianos" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Livianos
                  <div class="checkbox-modelo"></div>
                </div>

                <div id="pesados" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Pesados
                  <div class="checkbox-modelo"></div>
                </div>
                
                <div id="construccion" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Construccion
                  <div class="checkbox-modelo"></div>
                </div>
              </div>
            </div>

            <!---------------------------------- Marcas -------------------------->

            <input type="hidden" id='marcas' name="marcas" value="todos">

            <div class="col-md-12 my-2">
              <div id="filtros-marca" class="filtros-title">
                <!-- <p class="filtros-title-white">Categorias</p> -->
                <h5 class="filtros-title-white">Carga util</h5>
              </div>


              <div id="select-marcas" class="col-md-12 bg-grayderco">
                <div id="3t" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 3.0T
                  <div class="checkbox-marca"></div>
                </div>

                <div id="4t" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 4.0T
                  <div class="checkbox-marca"></div>
                </div>

                <div id="5t" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 5.0T
                  <div class="checkbox-marca"></div>
                </div>

                <div id="6t" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 6.0T
                  <div class="checkbox-marca"></div>
                </div>
               
                <div id="9t" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 9.0T
                  <div class="checkbox-marca"></div>
                </div>

                <div id="10t" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 10.0T
                  <div class="checkbox-marca"></div>
                </div>
                <div id="10.8t" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 10.8T
                  <div class="checkbox-marca"></div>
                </div>
                <div id="13t" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 13.0T
                  <div class="checkbox-marca"></div>
                </div>
                <div id="14.8t" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 14.8T
                  <div class="checkbox-marca"></div>
                </div>
                <div id="48t" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 48T
                  <div class="checkbox-marca"></div>
                </div>
                <div id="15m3" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 15 M3
                  <div class="checkbox-marca"></div>
                </div>
                <div id="9m3" class="marca-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> 9M3
                  <div class="checkbox-marca"></div>
                </div>
              </div>

            </div>

          </div>
          <div class="col-12 col-sm-12 col-md-12 col-xl-3">
            <div class="col-12 espacioBtns">
              <button id="btnBuscar" class="btnSeguir2 " type="button" name="button">
                BUSCAR
              </button>
            </div>
          </div>
        </div>
      </form>

    <?php } else if ($filtro == 'motos'){ ?>

      <form id="formfilter" action="" method="POST">
        <div class="row text-center mgt">
          <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-6 text-center marginSeccion">
            <div class="col-12 np espacioPregunta pdTb">
              <h5 class="filtros-title-white">PRECIO</h5>
            </div>

            <div class="min">
              <div class="marginEspacioPrecios">
                <div for="inputMin" class="pdRight negrita text-white col-12">Desde $</div>
                <input type="text" name="min" class="text-center inputPrecios " maxlength="6" id="inputMin" placeholder="Ingrese su rango" onkeypress="return insNumber(event)" style="
                  border-radius: 25px;"></input>
              </div>
            </div>
            <div class="max">
              <div class="marginEspacioPrecios">
                <div for="inputMin" class="pdRight negrita text-white col-12">Hasta $</div>
                <input type="text" name='max' class="text-center inputPrecios " maxlength="6" id="inputMax" placeholder="Ingrese su rango" onkeypress="return insNumber(event)" style="
                  border-radius: 25px;"></input>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-xl-6 text-center marginTopCategorias">
            <div class="col-md-12 ">
              <div id="filtros-perfil" class="filtros-title">
                <!-- <p class="filtros-title-white">Categorias</p> -->
                <h5 class="filtros-title-white">Categorias</h5>
              </div>

              <input type="hidden" id='perfiles' name="perfil" value="todos">

              <div id="select-perfiles" class="col-md-12 bg-grayderco">
                <div id="sport" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> On Sport
                  <div class="checkbox-modelo"></div>
                </div>

                <div id="off" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> On Off
                  <div class="checkbox-modelo"></div>
                </div>
                
                <div id="utility" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> On Utility
                  <div class="checkbox-modelo"></div>
                </div>

                <div id="chopper" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Chopper
                  <div class="checkbox-modelo"></div>
                </div>
                <div id="scooter" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Scooter
                  <div class="checkbox-modelo"></div>
                </div>
                <div id="cub" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Cub
                  <div class="checkbox-modelo"></div>
                </div>
                <div id="touring" class="modelo-select">
                  <i class="fa fa-angle-right" aria-hidden="true"></i> Touring
                  <div class="checkbox-modelo"></div>
                </div>
              </div>
            </div>

            <!---------------------------------- Marcas -------------------------->

            <input type="hidden" id='marcas' name="marcas" value="todos">

          </div>
          <div class="col-12 col-sm-12 col-md-12 col-xl-3">
            <div class="col-12 espacioBtns">
              <button id="btnBuscar" class="btnSeguir2 " type="button" name="button">
                BUSCAR
              </button>
            </div>
          </div>
        </div>
      </form>
    <?php }?>

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

    $('#select-marcas').toggle();

    let perfil = 'todos';
    let min = '';
    let max = '';
    let marca = 'Todas las marcas';
    let tipo = 'todas';
    let marcas = 'todas';

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

    var buscar_marca = [];

    $('.marca-select').click(function() {

      if ($(this).hasClass('checkbox-marca-selected-color')) {
        //Removemos del array de búsqueda por modelos
        var index = buscar_marca.indexOf(this.id);

        if (index > -1) {
          buscar_marca.splice(index, 1);
        }
      } else {
        //Agregamos al array de búsqueda por modelos
        buscar_marca.push(this.id);
      }

      $(this).toggleClass('checkbox-marca-selected-color');
      $(this).children('.checkbox-marca').toggleClass('checkbox-marca-selected');
      marcas = buscar_marca;
    });

    /*  $('#buscar-marcas').change(function() {
       marca = $('#buscar-marcas option:selected').val();
     } */

    $('#filtros-marca').click(function() {
      $('#select-marcas').toggle(200);
      $('#select-perfiles').toggle(200);
    })

    $('#filtros-perfil').click(function() {
      $('#select-perfiles').toggle(200);
      $('#select-marcas').toggle(200);
    })


    $('#buscar-categorias').change(function() {
      perfil = $('#buscar-categorias option:selected').val();
    })

    $('#btnBuscar').click(function() {

      //perfil = $('#buscar-categorias option:selected').val();



      min = $('#inputMin').val();
      max = $('#inputMax').val();
      $('#perfiles').val(tipo);
      $('#marcas').val(marcas);



      /* if ($.trim(min).length = 0){
        if (perfil == 'Seleccione su categoría'){
          perfil = $('#buscar-categorias option:selected').val('todos');
        }
      } */

      if ($.trim(min).length = 0) {
        $('#inputMin').val('0');
      }

      if ($.trim(max).length = 0) {
        $('#inputMax').val('0');
      }

      $('#formfilter').attr('action', 'filtro');
      $('#formfilter').submit();


      /* 
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
            })  */
    })



  });
</script>