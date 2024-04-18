<?php
require "../../php/conexion.php";
if (isset($_POST['crearIncidencia'])) {
    if (isset($_POST['nomIncidencia'])) {
        if (isset($_POST['estAlIncidencia'])) {
            if (isset($_POST['DesIncidencia'])) {
                if (isset($_POST['InformadorIncidencia'])) {
                    if (isset($_POST['responsableIncidencia'])) {
                        if (isset($_POST['prioriIncidencia'])) {
                            if (isset($_POST['sprintIcidencidencia'])) {
                                $sqlidIncidencia = "SELECT idsprint FROM `sprint` WHERE spr_idproyect = '$proyecto'";
                                $res = $con->query($sqlid);
                                if ($res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                        $idSprint = ($row["idsprint"]) + 1;
                                    }
                                } else {
                                    $idSprint = 1;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}