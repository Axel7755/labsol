<?php
require "../../php/conexion.php";

$proyecto = $_GET['proy'];
$sqlverAlumnos="SELECT idalumno, CONCAT(al_nombre,' ',al_apP,' ',al_apM) AS nombre, al_correo
FROM `alumno` WHERE idalumno NOT IN(SELECT pa_idalumno FROM proyecto_alumno WHERE pa_idproyect = '$proyecto')";                               
                
$res =$con->query($sqlverAlumnos);
     
if($res->num_rows>0){
    while($row = $res->fetch_assoc()){
        echo'<tr>
            <td>'.$row["nombre"].'</td>
            <td>'.$row["al_correo"].'</td>
            <td>
                <input class="form-check-input me-1" type="checkbox" name="Alumnos[]" value="'.$row["idalumno"].'" aria-label="...">
            </td>
        </tr>';
    }
}
else{
    echo "<br><p style='color: red;'>Error no se encontraron datos</p>";
}
