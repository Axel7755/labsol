<?php
require "../php/conexion.php";
$tipo = $_SESSION['Tipo'];
$id = $_SESSION['ID'];
switch ($tipo){
    case 0:
        $sqlVproy = "SELECT * FROM `proyecto` proy JOIN `proyecto_alumno` proyal 
        ON (proy.idproyect=proyal.pa_idproyect) WHERE pa_idalumno = '$id'";
        break;
    case 1:
        $sqlVproy = "SELECT * FROM `proyecto` WHERE solicitante_idsolicitante = '$id'";
        break;
    case 2:
        $sqlVproy = "SELECT * FROM `proyecto` ";
        break;
}
