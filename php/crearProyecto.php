<?php
require "../php/conexion.php";
if (isset($_POST['cproy'])) {
    if (isset($_POST['cproy_nom']) && !empty($_POST['cproy_nom'])) {
        if (isset($_POST['cproy_comm']) && !empty($_POST['cproy_comm'])) {
            $proy = $_POST['cproy_nom'];
            $proycom = $_POST['cproy_comm'];
            $sql1 = "SELECT * FROM `proyecto`";
            $res = $con->query($sql1);
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $Idres = ($row["idproyect"]) + 1;
                }
            } else {
                $Idres = 1;
            }

            if ($_FILES['imagens']['size'] != 0) {
                $tmp_name = $_FILES["imagens"]["tmp_name"];
                $nombrei = $_FILES['imagens']['name'];
                //if (! is_dir('imgRecetas') ) mkdir ( 'imgRecetas' , 0755);
                $carpeta = "../images/proyecto" . $Idres;
                $config['upload_path'] = $carpeta;
                if (!is_dir($carpeta)) {
                    if (mkdir($carpeta, 0777, true)) {
                        $destino =  $carpeta . "/" . $Idres . $nombrei;
                        if (move_uploaded_file($tmp_name, $destino)) {
                            //echo "se subio";
                        } else {
                            //echo $_FILES['imagens']['error'];
                        }
                    } else {
                        die('Fallo al crear las carpetas...');
                    }
                } else {
                    $destino =  $carpeta . "/" . $Idres . $nombrei;
                    if (move_uploaded_file($tmp_name, $destino)) {
                        //echo "se subio";
                    } else {
                        //echo $_FILES['imagens']['error'];
                    }
                }
                $sqlproy = "INSERT INTO proyecto (idproyect,nombrePr,proyectcol,img)
                VALUES ('$Idres','$proy','$proycom','$destino')";
            }else{
                $sqlproy = "INSERT INTO proyecto (idproyect,nombrePr,proyectcol)
                VALUES ('$Idres','$proy','$proycom')";
            }
            if ($con->query($sqlproy) == true) {
                header("Location:./proyectos.php");
            }else{
                echo "<br><p style='color: rgb(136, 1, 1);'>Error al guardar</p>";            
            }
        }
    }
}
