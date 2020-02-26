<section class="paddingPage">
  <div class="row posElements">
    <div class="espaceMovil col-12 order-2 col-md-6  col-lg-6 col-xl-2 order-md-2 order-lg-2 order-xl-1 col-xl-2">
      <img class="img-responsive posLogo" width="180px" src="app/images/logo_natura.png" alt="">
    </div>
    <div class="espaceMovil col-12 order-3 col-md-6 col-lg-6 col-xl-2 order-md-3 order-lg-3 order-xl-2">
      <div class="textSlogan">El lugar es<br>mas bonito<br>contigo</div>
    </div>
    <div class="contenedor-datos col-12 order-1 order-md-1 col-lg-12 offset-lg-0 order-lg-1 order-xl-3 col-xl-7 offset-xl-1">
      <div class="fondoForms col-12 np">
        <div class="col-12 text-center topTitle">
          <h1>
            REGÍSTRATE
          </h1>
          <div class="col-12 col-md-8 offset-md-2">
            <p class="textoRegistro">
              Para empezar, ingresa tu número de DNI o CODIGO DE CONSULTORA
            </p>
          </div>
          <!--div class="lineHeader">
          </div-->
        </div>
        <div class="col-12 col-sm-12 col-md-12 offset-md-0 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 posFormIngreso">
          <form class="formDNI" method="post">
            <input id="dni" class="inputForm" type="text" name="dni" maxlength="8">
            <p id="errorDNI" class="errorStyle">
              Debe ingresar su DNI o su Código de consultora
            </p>
            <div class="col-12 espaceBtnForm np text-center">
              <button class="btnFormulario" type="button" name="button" value="1">
                INGRESAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

 <!-- Modal -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titlemodal">Nuevo turno</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>

