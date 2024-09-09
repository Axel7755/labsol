<?php
require "../../php/conexion.php";
if (isset($_POST['editarIncidencia']) && !empty($_POST['editarIncidencia'])) {
    if (isset($_POST['nomIncidenciaEd'])) {
        if (isset($_POST['estAlIncidenciaEd'])) {
            if (isset($_POST['desIncidenciaEd'])) {
                if (isset($_POST['informadorIncidenciaEd'])) {
                    if (isset($_POST['responsableIncidenciaEd'])) {
                        if (isset($_POST['prioriIncidenciaEd'])) {
                            if (isset($_POST['sprintIcidencidenciaEd'])) {

                                $idInc = $_POST['editarIncidencia'];


                                $proyecto = $_GET['proy'];
                                $nomInc = $_POST['nomIncidenciaEd'];
                                $estAlInc = $_POST['estAlIncidenciaEd'];
                                $DesInc = $_POST['desIncidenciaEd'];
                                $InfoInc = $_POST['informadorIncidenciaEd'];
                                $RespInc = $_POST['responsableIncidenciaEd'];
                                $prioInc = $_POST['prioriIncidenciaEd'];
                                $sprintInc = $_POST['sprintIcidencidenciaEd'];

                                $sqlCrearInc = "UPDATE `tarea` SET tarea = '$nomInc', descripcion = '$DesInc', prioridad = '$prioInc',
                                estadoAl_idestadoAl = '$estAlInc', sprint_idsprint = '$sprintInc',
                                ta_spr_idproyect = '$proyecto', notificador = '$InfoInc' WHERE `idtarea` = '$idInc'";
                                //echo $sqlCrearInc;

                                if ($con->query($sqlCrearInc)) {

                                    $sqlAlumInc = "UPDATE tarea_a_alumno SET r_idalumno = '$RespInc' WHERE r_idtarea = $idInc";
                                    if ($con->query($sqlAlumInc)) {

                                        //echo "antes del for";
                                        if (isset($_POST['ning']) && !empty($_POST['ning'])) {
                                            $ning = $_POST['ning'];

                                            $sqlDelSubs = "DELETE FROM `tarea` WHERE `tarea_idtarea` = '$idInc'";
                                            if ($con->query($sqlDelSubs) == true) {

                                                $sqlidIncidencia = "SELECT idtarea FROM `tarea` ORDER BY idtarea ASC";
                                                $resInc = $con->query($sqlidIncidencia);
                                                if ($resInc->num_rows > 0) {
                                                    while ($rowInc = $resInc->fetch_assoc()) {
                                                        $subIdIn = ($rowInc["idtarea"]) + 1;
                                                    }
                                                } else {
                                                    $subIdIn = 1;
                                                }

                                                for ($x = 1; $x <= $ning; $x++) {
                                                    //echo "for";

                                                    if (isset($_POST['nombreSub' . $x])) {

                                                        $subIdIn++;
                                                        $nombreSubInc = $_POST['nombreSub' . $x];
                                                        $desSubInc = $_POST['descrip' . $x];

                                                        $sqlInsSubInc = "INSERT INTO `tarea`
                                                (idtarea, tarea, descripcion, prioridad, tarea_idtarea, estadoAl_idestadoAl, sprint_idsprint, ta_spr_idproyect, notificador)
                                                VALUES ('$subIdIn', '$nombreSubInc', '$desSubInc', '$prioInc', '$idInc', '$estAlInc', '$sprintInc', '$proyecto', '$InfoInc')";
                                                        //echo $sqlpa;

                                                        //echo $sqlInsSubInc;
                                                        if ($con->query($sqlInsSubInc)) {

                                                        } else {
                                                            echo "<br><p style='color: rgb(136, 1, 1);'>Error al guardar relacion</p>";
                                                        }
                                                    } else {
                                                        echo "<br><p style='color: rgb(136, 1, 1);'>Una sub-incidencia no se pudo guardar, no deje espacios en blanco</p>";
                                                        //$sqld = "DELETE FROM tarea WHERE idtarea ='$idInc' ";
                                                        //$con->query($sqld);
                                                        break;
                                                    }
                                                }
                                            }

                                        }
                                    }
                                } else {
                                    echo "<br><p style='color: rgb(136, 1, 1);'>Error al guardar</p>";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}