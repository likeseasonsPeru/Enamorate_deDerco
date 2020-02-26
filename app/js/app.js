$(document).ready(function () {
  //NÚMERO DE DOCUMENTO
  var flag = true;
  $("#dni").keydown(function (e) {
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

  $('.btnFormulario').click(function () {

    var dni = $('#dni').val();
    if (dni.length < 7) {
      $('#errorDNI').css('opacity', '1');
    } else {
        $.ajax({
          url: 'models/verifyStatus.php',
          type: 'POST',
          data: {dni: dni},
          success: function (response) {
            if (response.trim() == '') {
              // PINTAR UN MODAL
              $('#titlemodal').text('El DNI o codigo que ingreso no se encuentra en la lista');
              $('#modal').modal('show');
              console.log('usuario fallido');
            }else if (response.trim() == 'Registrado'){
              // pintar otro modal
              $('#titlemodal').text('Ya hay un turno seleccionado con este DNI o codigo');
              $('#modal').modal('show');
              console.log(response.trim());
            }
            else {
              $('.contenedor-datos').css('opacity', '0');
              $('#errorDNI').css('opacity', '0');
              $(".contenedor-datos").fadeOut(500, function () {
                var name = response.trim()
                $.ajax({
                  url: 'models/reglas.php',
                  type: 'POST',
                  data: {dni, name},
                  datatype: 'html',
                  success: function (datahtml) {
                    $('body').css("background-image", "url('app/images/background_madrenatura2.png')");
                    $('body').css('background-size', 'cover');
                    //document.getElementById("backgroundImage").style.backgroundImage = "url(app/images/background_madrenatura2.png)";
                    /*document.getElementById("backgroundImage").style.backgroundRepeat = "no-repeat";
                    document.getElementById("backgroundImage").style.backgroundSize= "cover";
                    document.getElementById("backgroundImage").style.backgroundPosition= "center";*/
                    document.getElementById("tituloHeader").style.opacity = "0";
                    setTimeout(() => {
                      document.getElementById("tituloHeader").style.opacity = "1";
                      document.getElementById("tituloHeader").style.textAlign = "right";
                      $('.contenedor-datos').html(datahtml);
                    }, 500)
                  }, error: function () {
                    $('.contenedor-datos').html('<p>error al cargar desde Ajax</p>');
                  }
                })
              });
              $(".contenedor-datos").fadeIn(500, function () {
                $('.contenedor-datos').css('opacity', '1');
              });
            }
          }, error: function () {
            $('.contenedor-datos').html('<p>error al cargar desde Ajax</p>');
          }
        });
    }

  });
});
