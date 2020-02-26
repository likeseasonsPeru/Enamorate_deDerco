<?php
$bien=$cont=0;
switch (basename($_SERVER['PHP_SELF'])) {
    case "inicio.php":
      $bien="class='active'";
    break;
    case "contactenos.php":
      $cont="class='active'";
    break;
}
?>

<header class="paddingPage ">
  <div class="col-12 text-left headerSpace">
    <h1 id="tituloHeader">
      Día de la<br>
      Madre<br>
      <span class="naturaLetter">Natura</span>
    </h1>
  </div>
</header>
