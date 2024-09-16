<?php
require "../../php/conexion.php";
if (isset($_POST['agregarAlumnos'])) {
    if (!empty($_POST['Alumnos'])) {
        foreach ($_POST['Alumnos'] as $alumno) {
            $proyecto = $_GET['proy'];
            $sqlAgregarAlumosProy = "INSERT INTO `proyecto_alumno` (`pa_idproyect`,`pa_idalumno`)VALUES
                    ('$proyecto','$alumno')";
            //echo"$sql";
            try {
                if ($con->query($sqlAgregarAlumosProy) == true) {
                    
                } else {
                    echo "<br><p style='color: blue;'>Error al asignar al grupo</p>";
                }                
            } catch (mysqli_sql_exception $e) {
                echo "<br><p style='color: red;'>Error,asignacion ya existente</p>";
            }
        }
    } else {
        echo "<br><p style='color: blue;'>Error, selecciona al menos un Alumno</p>";
    }
}