<?php
require "../../php/conexion.php";

$sqlverAlumnos="SELECT idalumno, CONCAT(al_nombre,' ',al_apP,' ',al_apM) AS nombre, al_correo FROM `alumno`";                               
                
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
