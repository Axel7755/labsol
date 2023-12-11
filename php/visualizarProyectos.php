<?php
require "../php/conexion.php";
$tipo = $_SESSION['Tipo'];
$id = $_SESSION['ID'];
switch ($tipo) {
  case 0:
    $sqlVproy = "SELECT * FROM `proyecto` proy JOIN `proyecto_alumno` proyal 
        ON (proy.idproyect=proyal.pa_idproyect) WHERE pa_idalumno = '$id'";
    break;
  case 1:
    $sqlVproy = "SELECT * FROM `proyecto` WHERE solicitante_idsolicitante = '$id'";
    break;
  case 2:
    $sqlVproy = "SELECT * FROM `proyecto`";
    break;
}
//Linea solo para pruebas
$sqlVproy = "SELECT * FROM `proyecto`";
//
$res = $con->query($sqlVproy);
if ($res->num_rows > 0) {
  while ($row = $res->fetch_assoc()) {
    echo '<div class="col proy">
            <a class="empty" href="./proyectos/backlog.php?proy=' . $row["idproyect"] . '">
              <div class="container text-center">
                <div class="row">
                  <div class="col left">
                    <img class="img-psrc" src="' . $row["img"] . '">
                  </div>
                  <div class="col-8 left">
                    <p class="tittle-p">' . $row["nombrePr"] . '</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col left">
                    <p class="subtittle-p">Descripcion:</p>
                    <p class="text-p">' . $row["proyectcol"] . '</p>
                  </div>
                </div>
              </div>
            </a>
          </div>';
  }
} else {
  echo "<br><p style='color: red;'>sin proyectos visibles</p>";
}
