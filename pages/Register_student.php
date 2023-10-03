<?php
session_start();
include "../php/registroAl.php";
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
  <title>Registrarse</title>
  <!--Favicon - icono de la pestaña-->
  <link rel="icon" type="image/x-icon" href="images/cocinero.png">
  <!--My CSS-->
  <link href="../css/registro_solicitante.css" rel="stylesheet">
  <!--Bootstrap-->

  <!-- Google Font Link Icons-->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>


<body>

  <div class="seccion-derecha">
    <!-- Contenido de la sección derecha -->
    
  <img src="../images/labsol_logo.png" class="img-thumbnail logo-log" alt="...">
    
</div>

  <div class="box">
    <span class="borderLine"></span>
    <form>

      <h2>Registro de Alumnos</h2>

      <div class="inputBox">
        <input type="text" name="nombre" required="required">
        <span>Nombre</span>
        <i></i>
    </div>

    <div class="inputBox">
        <input type="text" name="ApellidoP" required="required">
        <span>Apellido paterno</span>
        <i></i>
    </div>

    <div class="inputBox">
        <input type="text" name="ApellidoM" required="required">
        <span>Apellido Materno</span>
        <i></i>
    </div>

      <div class="inputBox">
        <input type="text" name="correo" required="required">
        <span>Correo electrónico</span>
        <i></i>
      </div>

      <div class="inputBox">
        <input type="password" name="contraseña" required="required">
        <span>Contraseña</span>
        <i></i>
      </div>

      <div class="inputBox">
        <input type="text" name="institucion" required="required">
        <span>Institución de procedencia (Nombre completo)</span>
        <i></i>
      </div>

      <input type="submit" value="Inicia sesión">

    </form>
  </div>
  <div class="clearfix"></div>
</body>

</html>