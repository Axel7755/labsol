<?php
require "../../php/conexion.php";
//echo "entra";
if (isset($_POST['crearSprint'])) {
    $proyecto = $_GET['proy'];

    $sqlid = "SELECT idsprint FROM `sprint` WHERE spr_idproyect = '$proyecto'";
    $res = $con->query($sqlid);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $idSprint = ($row["idsprint"]) + 1;
        }
    } else {
        $idSprint = 1;
    }
    $sqlInserSprint = "INSERT INTO sprint (idsprint,nombre_sp,estado,spr_idproyect)
                VALUES ('$idSprint','Sprint $idSprint','inactivo','$proyecto')";
    //echo $sqlInserSprint;
    if ($con->query($sqlInserSprint) == true) {
        
    } else {
        echo "<br><p style='color: rgb(136, 1, 1);'>Error al guardar</p>";
    }
}
