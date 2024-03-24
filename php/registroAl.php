<?php
require "../php/conexion.php";
if (isset($_POST['mandar'])) {
    if (isset($_POST['nombre'])) {
        $usuario = $_POST['nombre'];
        if (isset($_POST['ApellidoP'])) {
            $app = $_POST['ApellidoP'];
            if (isset($_POST['ApellidoM'])) {
                $apm = $_POST['ApellidoM'];
                if (isset($_POST['correo'])) {
                    $corr = $_POST['correo'];
                    if (isset($_POST['contraseña'])) {
                        if (isset($_POST['institucion'])) {
                            $sqldup = "SELECT * FROM `solicitante` WHERE so_correo = '$corr'";
                            $resup = $con->query($sqldup);
                            $sqldup1 = "SELECT * FROM `alumno` WHERE al_correo = '$corr'";
                            $resup1 = $con->query($sqldup1);
                            if (!($resup->num_rows > 0) && !($resup1->num_rows > 0)) {
                                $flag = false;
                                $institucion = $_POST['institucion'];
                                $sqlins = "SELECT * FROM `institucion` WHERE nombre_oficial = '$institucion' ";
                                $resi = $con->query($sqlins);
                                if ($resi->num_rows > 0) {
                                    while ($rowi = $resi->fetch_assoc()) {
                                        $idInstitucion = $rowi["idinstitucion"];
                                    }
                                    $flag = true;
                                } else {
                                    $sqlins = "SELECT * FROM `institucion`";
                                    $resi = $con->query($sqlins);
                                    if ($resi->num_rows > 0) {
                                        while ($rowi = $resi->fetch_assoc()) {
                                            $idInstitucion = ($rowi["idinstitucion"]) + 1;
                                        }
                                    } else {
                                        $idInstitucion = 1;
                                    }
                                    $sqlinsins = "INSERT INTO `institucion` (idinstitucion, nombre_oficial) VALUES ('$idInstitucion','$institucion')";
                                    if ($con->query($sqlinsins) == true) {
                                        $flag = true;
                                    } else {
                                        $flag = false;
                                        echo "<br><p style='color: red;'>Error al guardar la institucion de procedencia</p>";
                                    }
                                }
                                if ($flag) {
                                    $sql1 = "SELECT * FROM `alumno`";

                                    $res = $con->query($sql1);
                                    if ($res->num_rows > 0) {
                                        while ($row = $res->fetch_assoc()) {
                                            $IdUs = ($row["idalumno"]) + 1;
                                        }
                                    } else {
                                        $IdUs = 1;
                                    }
                                    $cont = $_POST['contraseña'];
                                    $conthash = password_hash($cont, PASSWORD_DEFAULT);
                                    $sql = "INSERT INTO `alumno` (`idalumno`, `al_nombre`, `al_apP`, `al_apM`, `al_conthash`, `al_correo`, `al_idinstitucion`)VALUES
                                    ($IdUs,'$usuario','$app','$apm','$conthash','$corr','$idInstitucion')";
                                    echo $sql;
                                    if ($con->query($sql) == true) {
                                        header("Location:login.php");
                                    } else {
                                        echo "<br><p style='color: red;'>Error al guardar usuario</p>";
                                    }

                                    $con->close();
                                }
                            }else{
                                echo "<br><p style='color: red;'>Error el correo ya existe</p>";
                            }
                        }else {
                            echo '<p class="errorl">Error, porfavor llene todos los campos</p>';
                        }
                    } else {
                        echo '<p class="errorl">Error, porfavor llene todos los campos</p>';
                    }
                } else {
                    echo '<p class="errorl">Error, porfavor llene todos los campos</p>';
                }
            } else {
                echo '<p class="errorl">Error, porfavor llene todos los campos</p>';
            }
        } else {
            echo '<p class="errorl">Error, porfavor llene todos los campos</p>';
        }
    } else {
        echo '<p class="errorl">Error, porfavor llene todos los campos</p>';
    }
}
