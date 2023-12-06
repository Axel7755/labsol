<?php
session_start();
include "../../php/sessionestado.php";
//echo"antes";
include "../../php/crearSprint.php";
include "../../php/eliminarSprint.php";
include "../../php/estadoSprint.php";
?> 
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backlog</title>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--My CSS-->
    <link href="../../css/menudesp.css" rel="stylesheet">
    <link href="../../css/backlog.css" rel="stylesheet">
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
                <h5 class="tittle-seccion">Nombre Proyecto</h5>
                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav ">
                    <li class="nav-item  py-md-1 my-md-1 active">
                        <a class="nav-link tittle-p" data-bs-toggle="collapse" href="#Planificación" role="button"
                            aria-expanded="false" aria-controls="Planificación">
                            <i class="bi bi-ui-radios px-2"></i>Planificación
                        </a>
                    </li>
                    <div class="collapse show" id="Planificación">
                        <ul class="navbar-nav sub-list">
                            <li class="nav-item py-md-1 my-md-1 active">
                                <a class="nav-link subtittle-p" href="./backlog.html"><i
                                        class="bi bi-menu-button-wide px-2"></i>Backlog</a>
                            </li>
                            <li class="nav-item  py-md-1 my-md-1">
                                <a class="nav-link subtittle-p" href="./board.html"><i
                                        class="bi bi-layout-three-columns px-2"></i>Tablero</a>
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
                            <li class="nav-item  py-md-1 my-md-1">
                                <a class="nav-link subtittle-p" href=""><i class="bi bi-person"></i>Miembro 1</a>
                            </li>
                            <li class="nav-item  py-md-1 my-md-1">
                                <a class="nav-link subtittle-p" href=""><i class="bi bi-person"></i>Miembro 2</a>
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
    <!--Seccion principal-->
    <div class="container text-start layout">
        <!--Menu superior-->
        <div class="row">
            <div class="col">
                <p class="tittle-p">Backlog</p>
            </div>
        </div>
        <div class="row bg-white rounded-3 pad">
            <div class="col-4">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-light bg-white" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="col-lg-1">
                <div class="dropdown">
                    <button class="btn drop dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Filtros
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">
                                <input class="form-check-input" type="checkbox" value="" id="MisIncidencias-f">
                                <label class="form-check-label" for="MisIncidencias-f">
                                    Mis incidencias
                                </label>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <input class="form-check-input" type="checkbox" value="" id="MisIncidencias-f">
                                <label class="form-check-label" for="MisIncidencias-f">
                                    Creacion o cambios recientes
                                </label>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
            include "../../php/verSprint.php"; 
        ?>
        <div class="row">
            <div class="col text-end btnincidencias">
                <form method="post">
                    <button type="sumbmit" name="crearSprint" class="btn add-sprint-button">
                        <p class="element"><i class="bi bi-plus"></i> Crear Sprint</p>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edicion de Sprints -->
    <div class="modal fade" id="EditarSprint1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Sprint: Nombre Sprint</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre del sprint</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Tablero Sprint 1">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Fecha de inicio</label>
                                    <input type="datetime-local" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Fecha de finalizacion</label>
                                    <input type="datetime-local" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="DesSprint1" class="form-label">Objetivo del Sprint</label>
                            <textarea name="DesSprint1" id="" cols="45" rows="10"></textarea>
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

    <!-- Modal crear incidencia -->
    <div class="modal fade" id="incidenciaCrear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre de incidencia</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Nombre de incidencia">
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Estado</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option selected value="1">Por hacer</option>
                                <option value="2">En progreso</option>
                                <option value="3">Listo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                            <textarea name="DesSprint1" id="" cols="45" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Informador</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option selected value="1">Usuario Actual</option>
                                <option value="2">Usuario del equipo</option>
                                <option value="3">Usuario del equipo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Responsable</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option selected value="1">Usuario Actual</option>
                                <option value="2">Usuario del equipo</option>
                                <option value="3">Usuario del equipo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Prioridad</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option value="1">Muy alta</option>
                                <option value="2">Alta</option>
                                <option selected value="3">Media</option>
                                <option value="1">baja</option>
                                <option value="2">Muy baja</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Sprint</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option value="1">Sprint 1</option>
                                <option value="1">Sprint 2</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal editar incidencia -->
    <div class="modal fade" id="incidenciaEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre de incidencia</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Nombre de incidencia">
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Estado</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option selected value="1">Por hacer</option>
                                <option value="2">En progreso</option>
                                <option value="3">Listo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                            <textarea name="DesSprint1" id="" cols="45" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Informador</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option selected value="1">Usuario Actual</option>
                                <option value="2">Usuario del equipo</option>
                                <option value="3">Usuario del equipo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Responsable</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option selected value="1">Usuario Actual</option>
                                <option value="2">Usuario del equipo</option>
                                <option value="3">Usuario del equipo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Prioridad</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option value="1">Muy alta</option>
                                <option value="2">Alta</option>
                                <option selected value="3">Media</option>
                                <option value="1">baja</option>
                                <option value="2">Muy baja</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Sprint</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option value="1">Sprint 1</option>
                                <option value="1">Sprint 2</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>