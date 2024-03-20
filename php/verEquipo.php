<?php
require "../../php/conexion.php";

$proyecto = $_GET['proy'];
$sqlVerEquipo = "SELECT idalumno, CONCAT(al_nombre,' ',al_apP,' ',al_apM) as nombre
FROM alumno al JOIN proyecto_alumno proy ON(proy.pa_idalumno = al.idalumno) WHERE proy.pa_idproyect = '$proyecto'";
$resVerEq = $con->query($sqlVerEquipo);
if ($resVerEq->num_rows > 0) {
    while ($rowVerEq = $resVerEq->fetch_assoc()) {

        if ($rowVerEq["idalumno"] == $_SESSION['ID'] && $_SESSION['Tipo'] == 0) {
           
        } else {
            echo '
            <li class="nav-item  py-md-1 my-md-1">
                <a class="nav-link subtittle-p" href=""><i class="bi bi-person"></i> '.$rowVerEq["nombre"].'</a>
            </li>';
        }

    }
}else{
    echo'
    <li class="nav-item  py-md-1 my-md-1">
        <a class="nav-link subtittle-p" href=""><i class="bi bi-person"></i>Miembro 1</a>
    </li>
    <li class="nav-item  py-md-1 my-md-1">
        <a class="nav-link subtittle-p" href=""><i class="bi bi-person"></i>Miembro 2</a>
    </li>';
}