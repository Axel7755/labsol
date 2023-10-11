<?php
session_start();
include "./php/sessionestado.php";
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="ARCM y AT" content="Team: Ultimate">
  <meta name="description" content="Página web de Labsol">
  <meta name="keywords" content="HTML, CSS, JavaScript, ">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Titulo-->
  <title>Proyectos</title>
  <!--Favicon - icono de la pestaña-->
  <link rel="icon" type="image/x-icon" href="images/cocinero.png">
  <!--My CSS-->
  <link href="./css/style.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/proyectos.css" rel="stylesheet">
  <!--Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Font Link Icons-->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
  <div class="container_nav">
    <div class="navigation">
      <ul>
        <li>
          <!--libre-->
        </li>

        <li>
          <a href="../index.php">
            <span class="icon">
              <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="title">Inicio</span>
          </a>
        </li>
        <li>
          <a href="../pages/calendario.html">
            <span class="icon">
              <ion-icon name="calendar-outline"></ion-icon>
            </span>
            <span class="title">Calendario de citas</span>
          </a>
        </li>
        <li class="activo">
          <a href="../pages/proyectos.php">
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
          <a href="#">
            <span class="icon">
              <ion-icon name="log-out-outline"></ion-icon>
            </span>
            <span class="title">Salir</span>
          </a>
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
        <img src="../images/perfilwoman.png" alt="us">
      </div>
    </div>

    <!--grillla de proyectos-->
    <div class="container">
      <p class="tittle-seccion">Proyectos:</p>

      <div class="container text-center proys-cont">
        <div class="row">
          <div class="col proy">
            <a class="empty" href="./proyectos/backlog.html">
              <div class="container text-center">
                <div class="row">
                  <div class="col left">
                    <img class="img-psrc" src="../images/Halo infinite.jpeg">
                  </div>
                  <div class="col-8 left">
                    <p class="tittle-p">Nombre Proyecto</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col left">
                    <p class="subtittle-p">Descripcion:</p>
                    <p class="text-p">redaccion de descripcion breve</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col proy">
            <a class="empty" href="">
              <div class="container text-center">
                <div class="row">
                  <div class="col left">
                    <img class="img-psrc" src="../images/Halo infinite.jpeg">
                  </div>
                  <div class="col-8 left">
                    <p class="tittle-p">Nombre Proyecto</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col left">
                    <p class="subtittle-p">Descripcion:</p>
                    <p class="text-p">redaccion de descripcion breve</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col proy">
            <a class="empty" href="">
              <div class="container text-center">
                <div class="row">
                  <div class="col left">
                    <img class="img-psrc" src="../images/Halo infinite.jpeg">
                  </div>
                  <div class="col-8 left">
                    <p class="tittle-p">Nombre Proyecto</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col left">
                    <p class="subtittle-p">Descripcion:</p>
                    <p class="text-p">redaccion de descripcion breve</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col proy">
            <a class="empty" href="">
              <div class="container text-center">
                <div class="row">
                  <div class="col left">
                    <img class="img-psrc" src="../images/Halo infinite.jpeg">
                  </div>
                  <div class="col-8 left">
                    <p class="tittle-p">Nombre Proyecto</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col left">
                    <p class="subtittle-p">Descripcion:</p>
                    <p class="text-p">redaccion de descripcion breve</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

    </div>


    <div class="container">
      <p class="tittle-seccion">Recientes:</p>

      <div class="container text-center proys-cont">
        <div class="row proy max-hight">
          <a class="empty" href="./proyectos/baclog.html"></a>
          <div class="col left">
            <img class="img-act" src="../images/Halo infinite.jpeg">
          </div>
          <div class="col-11">
            <div class="container text-center">
              <div class="row">
                <div class="col left">
                  <p class="subtittle-p">Nombre Actividad</p>
                </div>
              </div>
              <div class="row">
                <div class="col left">
                  <p class="text-p">Proyecto</p>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>

    </div>
    <div class="container">

        <button type="button" class="btn" data-bs-toggle="modal"
        data-bs-target="#CrearProyecto">
          <p class="tittle-seccion"><i class="bi bi-plus"></i> Crear Proyecto</p>
        </button>
    </div>
  </div>

  <!-- Modal crear proyecto -->
  <div class="modal fade" id="CrearProyecto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Proyecto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre del sprint</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                          placeholder="Tablero Sprint 1">
                  </div>
                  <div class="mb-3">
                      <label for="DesSprint1" class="form-label">Imagen del proyecto</label>
                      <input type="file" name="imagen">
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary">Guardar</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
      </div>
  </div>
</div>

  <!-- Scripts de iconos 'ionicons' -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!--My script-->
  <script src="../js/principal.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>