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
                            $sql1 = "SELECT * FROM `solicitante`";

                            $res = $con->query($sql1);
                            if ($res->num_rows > 0) {
                                while ($row = $res->fetch_assoc()) {
                                    $IdUs = ($row["idusuarios"]) + 1;
                                }
                            } else {
                                $IdUs = 1;
                            }
                            $cont = $_POST['contraseña'];
                            $conthash = password_hash($cont, PASSWORD_DEFAULT);
                            $institucion = $_POST['institucion'];
                            $sql = "INSERT INTO `solicitante` (`idsolicitante`, `so_nombre`, `so_apP`, `so_apM`, `so_conthash`, `so_correo`)VALUES
                            ($IdUs,'$usuario','$app','$apm','$conthash','$corr')";
                            echo $sql;
                            if ($con->query($sql) == true) {
                                header("Location:login.php");
                            } else {
                                echo "<br><p style='color: red;'>Error al guardar</p>";
                            }

                            $con->close();
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
