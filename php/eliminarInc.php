<?php
require "../../php/conexion.php";
//echo "entra";
if (isset($_POST['eliminarInci']) && !empty($_POST['eliminarInci'])) {

    $inc = $_POST['eliminarInci'];
    //echo $sprint;
    $sqlDelInc = "DELETE FROM `tarea` WHERE `idtarea` = '$inc'";

    $sqlDelSubInc = "DELETE FROM `tarea` WHERE `tarea_idtarea` = '$inc'";
    //echo $sqlDelSubInc;
    if ($con->query($sqlDelInc) == true) {
        if ($con->query($sqlDelSubInc) == true) {
        
        } else {
            echo "<br><p style='color: rgb(136, 1, 1);'>Error al eliminar subtarea</p>";
        }
    } else {
        echo "<br><p style='color: rgb(136, 1, 1);'>Error al eliminar</p>";
    }
}
