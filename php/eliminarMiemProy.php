<?php
require "../../php/conexion.php";
if (isset($_POST['eliminarMiembros'])) {
    if (!empty($_POST['Miembros'])) {
        foreach ($_POST['Miembros'] as $miembro) {
            $proyecto = $_GET['proy'];
            $sqlEliminarMiemProy = "DELETE FROM `proyecto_alumno` WHERE `pa_idproyect` =
            $proyecto AND `pa_idalumno` = $miembro";
            //echo"$sql";
            try {
                if ($con->query($sqlEliminarMiemProy) == true) {
                    
                } else {
                    echo "<br><p style='color: blue;'>Error al eliminar del grupo</p>";
                }                
            } catch (mysqli_sql_exception $e) {
                echo "<br><p style='color: red;'>Error,asignacion existente e inmutable</p>";
            }
        }
    } else {
        echo "<br><p style='color: blue;'>Error, selecciona al menos un Miembro</p>";
    }
}