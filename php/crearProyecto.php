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

                $sqlEstAl = "SELECT 'idestadoAl' FROM `estadoAl` WHERE estAl_idproyect='$Idres'";
                $resEstAl = $con->query($sqlEstAl);
                if ($resEstAl->num_rows > 0) {
                    while ($rowresEstAl = $resEstAl->fetch_assoc()) {
                        $IdresEstAl = ($rowresEstAl["idestadoAl"]) + 1;
                    }
                } else {
                    $IdresEstAl = 1;
                }
                
                $sqlCrearEstAl1 = "INSERT INTO `estadoAl` (idestadoAl,estadoAl,estAl_idproyect)
                VALUES ('$IdresEstAl','Por hacer','$Idres'); ";
                $IdresEstAl++;
                
                $sqlCrearEstAl2 = "INSERT INTO `estadoAl` (idestadoAl,estadoAl,estAl_idproyect)
                VALUES ('$IdresEstAl','En curso','$Idres'); ";
                $IdresEstAl++;

                $sqlCrearEstAl3 = "INSERT INTO `estadoAl` (idestadoAl,estadoAl,estAl_idproyect)
                VALUES ('$IdresEstAl','Listo','$Idres'); ";

                $sqlEst = "SELECT 'idestadoAdm' FROM `estadoAdm`";
                $resEst = $con->query($sqlEstAl);
                if ($resEst->num_rows > 0) {
                    while ($rowresEst = $resEst->fetch_assoc()) {
                        $IdresEst = ($rowresEst["idestadoAdm"]) + 1;
                    }
                } else {
                    $IdresEst = 1;
                }

                $sqlCrearEstAdm1 = "INSERT INTO `estadoAdm` (idestadoAdm,estadoAd,estAdm_idproyect)
                VALUES ('$IdresEst','En revision','$Idres'); ";
                $IdresEst++;

                $sqlCrearEstAdm2 = "INSERT INTO `estadoAdm` (idestadoAdm,estadoAd,estAdm_idproyect)
                VALUES ('$IdresEst','Completado','$Idres'); ";
                $IdresEst++;
                
                $sqlCrearEst = $sqlCrearEstAl1.$sqlCrearEstAl2.$sqlCrearEstAl3.$sqlCrearEstAdm1.$sqlCrearEstAdm2;
                echo $sqlCrearEst;
                if ($con->multi_query($sqlCrearEst) == true) {
                    header("Location:./proyectos.php");
                }else{
                    echo "<br><p style='color: rgb(136, 1, 1);'>Error en la creación de estados</p>";
                }
            }else{
                echo "<br><p style='color: rgb(136, 1, 1);'>Error al guardar</p>";            
            }
        }
    }
}
