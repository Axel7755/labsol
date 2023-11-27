<?php
require "../../php/conexion.php";

$proyecto = $_GET['proy'];
$sqlVerSrpints = "SELECT * FROM sprint WHERE spr_idproyect = '$proyecto'";
$res = $con->query($sqlVerSrpints);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()){
        echo '<div class="row layout bg-grey rounded-3">
        <div class="col element">
            <div class="row">
                <div class="col-lg-2">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="collapse"
                        data-bs-target="#SprintId'.$row["idsprint"].'" aria-expanded="false" aria-controls="collapseExample">
                        Tablero '.$row["nombre_sp"].'
                    </button>
                </div>
                <div class="col-lg-2">
                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#EditarSprint1">
                        <i class="bi bi-pencil"></i> Editar Sprint
                    </button>
                </div>
                <div class="col-lg-2">
                    <button class="btn add-sprint-button" type="button">
                        Iniciar Sprint
                    </button>
                </div>
                <div class="col text-end">
                    <div class="dropdown">
                        <button class="btn drop" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                            <a class="dropdown-item" href="#">
                            <form method="post">
                                <button type="sumbmit" name="eliminarSprint" value="'.$row["idsprint"].'" class="btn bg-transparent margin0">
                                    
                                        Eliminar Sprint
                                </button>
                            </form>
                            </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    Creacion o cambios recientes
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">

                                    Creacion o cambios recientes
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row collapse" id="SprintId'.$row["idsprint"].'">
                <div class="col">
                    <div class="row punteado rounded-3 contenido">
                        <div class="col margin0">
                            <div class="row incidencia-cont">
                                <div class="col-9">
                                    <p class="incidencia-text">Nombre de incidencia</p>
                                </div>
                                <div class="col-lg-2 ">
                                    <select class="form-select empty-background completo"
                                        aria-label="Default select example" id="t-incidencia">
                                        <option selected value="1">Por hacer</option>
                                        <option value="2">En progreso</option>
                                        <option value="3">Listo</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="dropdown">
                                        <button class="btn drop" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu margin0">
                                            <li class="">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#incidenciaCrear">
                                                    <label class="form-check-label" for="MisIncidencias-f">
                                                        Editar
                                                    </label>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <label class="form-check-label" for="MisIncidencias-f">
                                                        Eliminar
                                                    </label>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col btnincidencias">
                            <button type="button" class="btn add-button" data-bs-toggle="modal"
                                data-bs-target="#incidenciaCrear">
                                <p class="element"><i class="bi bi-plus"></i> Crear incidencia</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    }
}