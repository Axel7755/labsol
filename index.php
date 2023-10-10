<?php
session_start();
include "./php/sessionestado.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!--Metadatos-->
  <meta charset="UTF-8">
  <meta name="ARCM y AT" content="Team: Ultimate">
  <meta name="description" content="Página web de Labsol">
  <meta name="keywords" content="HTML, CSS, JavaScript, ">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Titulo-->
  <title>Labsol Proyects</title>
  <!--Favicon - icono de la pestaña-->
  <link rel="icon" type="image/x-icon" href="images/cocinero.png">
  <!--My CSS-->
  <link href="./css/style.css" rel="stylesheet">
  <!--Bootstrap-->

  <!-- Google Font Link Icons-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
  <div class="container_nav">
    <div class="navigation">
      <ul>
        <li>
          <!--libre-->
        </li>

        <li class="activo">
          <a href="./index.html">
            <span class="icon">
              <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="title">Inicio</span>
          </a>
        </li>
        <li>
          <a href="./pages/calendario.html">
            <span class="icon">
              <ion-icon name="calendar-outline"></ion-icon>
            </span>
            <span class="title">Calendario de citas</span>
          </a>
        </li>
        <li>
          <a href="./pages/proyectos.html">
            <span class="icon">
              <ion-icon name="albums-outline"></ion-icon>
            </span>
            <span class="title">Proyectos</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="share-outline"></ion-icon>
            </span>
            <span class="title">Carga de Documentos</span>
          </a>
        </li>
        <!--Estos 2 ultimos van hasta abajo-->
        <li class="abajo">
          <a href="#">
            <span class="icon">
              <ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Configuración</span>
          </a>
        </li>

        <li>
          <form method="post" action="./pages/login.php"><button class="bg-transparent" type="submit" name="cerrars">
              <a href="#">
                <span class="icon">
                  <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Salir</span>
              </a>
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>

  <!--main-->
  <div class="main">
    <div class="topbar">
      <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
      </div>
      <!--Search-->
      <div class="search">
        <label>
          <input type="text" placeholder="Buscar Aquí">
          <ion-icon name="search-outline"></ion-icon>
        </label>
      </div>
      <!--User img-->
      <div class="user">
        <img src="images/perfilwoman.png" alt="usuario">
      </div>
    </div>

    <!--Los demas componentes-->

  </div>


  <!-- Scripts de iconos 'ionicons' -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!--My script-->
  <script src="./js/principal.js"></script>
</body>


</html>