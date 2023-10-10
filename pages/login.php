<?php
// echo'<p>antes</p>';
include "../php/log.php";
?>
<!DOCTYPE html>
<html>

<head>
  <!--Metadatos-->
  <meta charset="UTF-8">
  <meta name="ARCM y AT" content="Team: Ultimate">
  <meta name="description" content="Página web de Labsol">
  <meta name="keywords" content="HTML, CSS, JavaScript, ">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Titulo-->
  <title>Iniciar sesión</title>
  <!--Favicon - icono de la pestaña-->
  <link rel="icon" type="image/x-icon" href="../images/cocinero.png">
  <!--My CSS-->
  <link href="../css/login.css" rel="stylesheet">
  <!--Bootstrap-->

  <!-- Google Font Link Icons-->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>


<body>

  <div class="seccion-derecha">
    <img src="../images/labsol_logo.png" class="img-thumbnail logo-log" alt="...">
  </div>

  <div class="box">
    <span class="borderLine"></span>
    <form method="post">
      <h2>Inicia sesión</h2>
      <div class="inputBox">
        <input type="email" name="correo" required="required">
        <span>Correo</span>
        <i></i>
      </div>

      <div class="inputBox">
        <input type="password" name="password" required="required">
        <span>Contraseña</span>
        <i></i>
      </div>
      <div class="links">
        <a href="#">¿Has olvidado tu contraseña?</a>
        <a href="./Register_solicitante.php">Regístrarse</a>
      </div>
      <input type="submit" name="mandar" value="Inicia sesión">

    </form>
  </div>
  <div class="clearfix"></div>
</body>

</html>