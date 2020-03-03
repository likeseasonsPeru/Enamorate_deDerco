<?php
$minimo = $_POST['min'];
$maximo = $_POST['max'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

 ?>

 <div class="container">
   <div class="row">
     <div class="col-12 espacioTop">
       <div class="col-12 text-center espacioPregunta">
        <h1>¿Como te consideras?</h1>
        <h3>Selecciona una de estas opciones y estarás mas cerca del auto soñado</h3>
       </div>
       <div class="row text-center">
         <div class="col-12 col-md-3 col-lg-3 col-xl-3 ">
           <button class="btnTipoSelect" type="button" name="button">
             <img class="imgTipo" src="app/img/tipo1.png" alt="">
             <h2>ESFORZADO</h2>
           </button>
         </div>
         <div class="col-12 col-md-3 col-lg-3 col-xl-3">
           <button class="btnTipoSelect" type="button" name="button">
             <img class="imgTipo" src="app/img/tipo2.png" alt="">
             <h2>FAMILIÓN</h2>
           </button>

         </div>
         <div class="col-12 col-md-3 col-lg-3 col-xl-3">
           <button class="btnTipoSelect" type="button" name="button">
             <img class="imgTipo" src="app/img/tipo3.png" alt="">
             <h2>EMPRENDEDOR</h2>
           </button>

         </div>
         <div class="col-12 col-md-3 col-lg-3 col-xl-3">
           <button class="btnTipoSelect" type="button" name="button">
             <img class="imgTipo" src="app/img/tipo4.png" alt="">
             <h2>NEUVO ADULTO</h2>
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

 <script type="text/javascript">
   /*Tienen que enviar por ajax tipo POST al */
 </script>
