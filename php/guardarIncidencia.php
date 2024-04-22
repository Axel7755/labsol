<?php
require "../../php/conexion.php";
if (isset($_POST['crearIncidencia'])) {
    if (isset($_POST['nomIncidencia'])) {
        if (isset($_POST['estAlIncidencia'])) {
            if (isset($_POST['desIncidencia'])) {
                if (isset($_POST['informadorIncidencia'])) {
                    if (isset($_POST['responsableIncidencia'])) {
                        if (isset($_POST['prioriIncidencia'])) {
                            if (isset($_POST['sprintIcidencidencia'])) {
                                $sqlidIncidencia = "SELECT idtarea FROM `tarea`";
                                $resInc = $con->query($sqlidIncidencia);
                                if ($resInc->num_rows > 0) {
                                    while ($rowInc = $resInc->fetch_assoc()) {
                                        $idInc = ($rowInc["idtarea"]) + 1;
                                    }
                                } else {
                                    $idInc = 1;
                                }

                                $proyecto = $_GET['proy'];
                                $nomInc=$_POST['nomIncidencia'];
                                $estAlInc=$_POST['estAlIncidencia'];
                                $DesInc=$_POST['desIncidencia'];
                                $InfoInc=$_POST['informadorIncidencia'];
                                $RespInc=$_POST['responsableIncidencia'];
                                $prioInc=$_POST['prioriIncidencia'];
                                $sprintInc=$_POST['sprintIcidencidencia'];

                                $sqlCrearInc="INSERT INTO `tarea`
                                (idtarea, tarea, descripcion, prioridad, estadoAl_idestadoAl, sprint_idsprint, ta_spr_idproyect, notificador)
                                VALUES ('$idInc', '$nomInc', '$DesInc', '$prioInc', '$estAlInc', '$sprintInc', '$proyecto', '$InfoInc')";
                                //echo $sqlCrearInc;
                                if ($con->query($sqlCrearInc) == true) {
                                    
                                    $sqlAlumInc="INSERT INTO tarea_a_alumno(r_idtarea,r_idalumno)
                                    VALUES ($idInc,$RespInc)";
                                    if ($con->query($sqlAlumInc) == true){

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