<?php
require './conexion.php';

$Respuesta = array();
$Respuesta["estado"] = 0;
$accion = $_POST["accion"];

switch ($accion) {
    case "create":
        accionCReatePHP($con);
        break;
    case "actualizarInsEst":
        actualizarInsEst($con);
        break;
    case "update":
        accionUpdatePHP($con);
        break;
    case "read":
        accionReadPHP($con);
        break;
    case "id_read":
        accionReadIdPHP($con);
        break;
    case "mostrarP":
        mostrarProyectos($con);
        break;
    case "ver":
        ver($con);
        break;
    default:
        accionError();

}

function accionCreatePHP($con)
{

    $proyecto = $_POST['proy'];
    //$Revisor = $_POST["revisor"];
    //$iden = $_POST['identrega'];
    $Select = "SELECT * FROM `estadoAl` WHERE `estAl_idproyect` = '$proyecto' ORDER BY `idestadoAl` ASC";
    $res = $con->query($Select);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $idestAl = ($row["idestadoAl"]) + 1;
        }
    } else {
        $idestAl = '1';
    }
    $Insertar = "INSERT INTO estadoAl (idestadoAl,estadoAl,estAl_idproyect) VALUES ($idestAl,'Nuevo título','$proyecto')";
    if ($con->query($Insertar) == true) {
        $Respuesta["estado"] = 1;
        $Respuesta["id"] = $idestAl;
        $Respuesta["mensaje"] = "Tablero agregado";
    } else {
        $Respuesta["estado"] = 0;
        $Respuesta["mensaje"] = "Ocurrio un error desconocido";
    }
    //$Respuesta["estado"] = 1;
    $con->close();
    echo json_encode($Respuesta);

}

function actualizarInsEst ($con){

    $incidenia = $_POST['incidenciaId'];
    $tablero = $_POST['estadoId'];
    $sqlCrearInc = "UPDATE `tarea` SET estadoAl_idestadoAl = '$tablero'  
    WHERE `idtarea` = '$incidenia'";
    if ($con->query($sqlCrearInc)) {
        $Respuesta["estado"] = 1;
        //$Respuesta["sql"] = $sqlCrearInc;
    }else{
        $Respuesta["estado"] = 0;
    }
    //$Respuesta["estado"] = 1;
    $Respuesta["sql"] = $sqlCrearInc;
    $con->close();
    echo json_encode($Respuesta);
}