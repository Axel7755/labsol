<?php
require "../../php/conexion.php";
//echo "entra";
if (isset($_POST['iniciarSprint'])&&!empty($_POST['iniciarSprint'])) {
    //echo "if";
    $proyecto = $_GET['proy'];
    $sprint = $_POST['iniciarSprint'];
    $sqlVerEstadoSrpints = "SELECT `estado` FROM `sprint` WHERE `spr_idproyect` = '$proyecto' AND `idsprint` = '$sprint'";
    $res = $con->query($sqlVerEstadoSrpints);

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            //echo $estadoSprint;
            if ($row["estado"] == 'inactivo') {
                $sqlEstadoSprint = "UPDATE `sprint` SET estado = 'activo' WHERE idsprint = '$sprint' and spr_idproyect = '$proyecto'";
                //echo $sqlInserSprint;
            } else {
                $sqlEstadoSprint = "UPDATE `sprint` SET estado = 'inactivo' WHERE idsprint = '$sprint' and spr_idproyect = '$proyecto'";
                //echo $sqlInserSprint;
            }
            if ($con->query($sqlEstadoSprint) == true) {
            } else {
                echo "<br><p style='color: rgb(136, 1, 1);'>Error al guardar</p>";
            }
        }
    }
}
