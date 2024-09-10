<?php
session_start();
include "../../php/sessionestado.php";
include "../../php/agregarAlumnoProy.php";
include "../../php/eliminarMiemProy.php";
//echo"antes";

require "../../php/conexion.php";
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
    <title>Tablero</title>
    <!--Favicon - icono de la pestaña-->
    <link rel="icon" type="image/x-icon" href="images/cocinero.png">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Font Link Icons-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--My CSS-->
    <link href="../../css/tablero.css" rel="stylesheet">
    <link href="../../css/proyectos.css" rel="stylesheet">
    <link href="../../css/menudesp.css" rel="stylesheet">

</head>

<body>
    <!--Seccion de menu lateral-->
    <div class="container-fluid ">
        <!--Botton de menu lateral-->
        <button class="btn button-color" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu-desp">
            <i class="bi bi-list"></i>
        </button>
        <!--Menu lateral-->
        <section class="offcanvas offcanvas-start menu-design" id="menu-desp" tabindex="-1">
            <div class="offcanvas-header" data-bs-theme="dark">
                <?php
                $proyecto = $_GET['proy'];
                $sqlNproy = "SELECT nombrePr FROM `proyecto` WHERE idproyect = '$proyecto'";
                //echo"$sqlNproy";
                $rest = $con->query($sqlNproy);
                if ($rest->num_rows > 0) {
                    while ($rowt = $rest->fetch_assoc()) {
                        echo '<h5 class="tittle-seccion">' . $rowt["nombrePr"] . '</h5>';
                    }
                }
                ?>
                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav ">
                    <li class="nav-item  py-md-1 my-md-1 active">
                        <a class="nav-link tittle-p" href="../proyectos.php">
                            <i class="bi bi-house-door"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item  py-md-1 my-md-1 active">
                        <a class="nav-link tittle-p" data-bs-toggle="collapse" href="#Planificación" role="button"
                            aria-expanded="false" aria-controls="Planificación">
                            <i class="bi bi-ui-radios px-2"></i>Planificación
                        </a>
                    </li>
                    <div class="collapse show" id="Planificación">
                        <ul class="navbar-nav sub-list">
                            <li class="nav-item py-md-1 my-md-1">
                            <?php
                                echo'
                                <a class="nav-link subtittle-p" href="./backlog.php?proy='.$proyecto.'"><i
                                        class="bi bi-menu-button-wide px-2"></i>Backlog</a>';
                            ?>
                            </li>
                            <li class="nav-item  py-md-1 my-md-1 active">
                                <?php
                                echo'
                                <a class="nav-link subtittle-p" href="./board.php?proy='.$proyecto.'"><i
                                        class="bi bi-layout-three-columns px-2"></i>Tablero</a>';
                                ?>
                            </li>
                        </ul>
                    </div>
                    <li class="nav-item  py-md-1 my-md-1">
                        <a class="nav-link tittle-p" data-bs-toggle="collapse" href="#Equipo" role="button"
                            aria-expanded="false" aria-controls="Equipo">
                            <i class="bi bi-people px-2"></i>Equipo
                        </a>
                    </li>
                    <div class="collapse" id="Equipo">
                        <ul class="navbar-nav sub-list">
                            <?php
                            include "../../php/verEquipo.php"
                                ?>
                            <li class="nav-item  py-md-1 my-md-1">
                                <a class="nav-link subtittle-p" data-bs-toggle="modal" data-bs-target="#AgregarMiembro"
                                    href=""><i class="bi bi-plus"></i>Agregar Miembro</a>
                            </li>
                        </ul>
                    </div>
                    <li class="nav-item  py-md-1 my-md-1">
                        <a class="nav-link tittle-p" data-bs-toggle="collapse" href="#Proyectos" role="button"
                            aria-expanded="false" aria-controls="Proyectos">
                            <i class="bi bi-person-workspace px-2"></i>Proyectos
                        </a>
                    </li>
                    <div class="collapse" id="Proyectos">
                        <ul class="navbar-nav sub-list">
                            <li class="nav-item  py-md-1 my-md-1">
                                <a class="nav-link subtittle-p" href=""><i class="bi bi-book"></i>Proyecto 1</a>
                            </li>
                            <li class="nav-item  py-md-1 my-md-1">
                                <a class="nav-link subtittle-p" href=""><i class="bi bi-book"></i>proyecto 2</a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </section>
    </div>
    <!--main-->

    <!--Los demas componentes-->

    <div class="container-titulo">
        <h1>Tablero</h1>
    </div>

    <div class="container-addCaja">
        <button type="button" id="agregarCaja" class="btn btn-blanco">
            <ion-icon id="plus" name="add-circle-outline"></ion-icon>
        </button>
    </div>

    <div class="container-board">
                <?php
                    include "../../php/verEstadosInc.php"
                ?>
    </div>

    <!-- Modal agregar alumno -->
    <div class="modal fade" id="AgregarMiembro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregar miembro al proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">

                        <table class='table table-striped  border = "1" ' id="table1">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Check</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include "../../php/verAlumnos.php";
                                ?>
                            </tbody>
                        </table>

                        <div class="form-actions d-flex justify-content-end">
                            <button type="submit" class="btn btn-success" name="agregarAlumnos">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal eliminar miembro -->
    <div class="modal fade" id="EliminarMiembro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar miembro del proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">

                        <table class='table table-striped  border = "1" ' id="table1">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Check</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include "../../php/verMiembros.php";
                                ?>
                            </tbody>
                        </table>

                        <div class="form-actions d-flex justify-content-end">
                            <button type="submit" class="btn btn-success" name="eliminarMiembros">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- Scripts de iconos 'ionicons' -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!--My script-->
<script src="../../js/principal.js"></script>
<script src="../../js/tablero.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>