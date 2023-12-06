<?php
require "../../php/conexion.php";
//echo "entra";
if (isset($_POST['eliminarSprint']) && !empty($_POST['eliminarSprint'])) {

    $proyecto = $_GET['proy'];
    $sprint = $_POST['eliminarSprint'];
    //echo $sprint;
    $sqlDelSprint = "DELETE FROM `sprint` WHERE `idsprint` = '$sprint' AND `spr_idproyect` = '$proyecto'";
    //echo $sqlDelSprint;
    if ($con->query($sqlDelSprint) == true) {
        
    } else {
        echo "<br><p style='color: rgb(136, 1, 1);'>Error al eliminar</p>";
    }
}
