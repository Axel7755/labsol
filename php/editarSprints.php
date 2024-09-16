<?php
require "../../php/conexion.php";
if (isset($_POST['editarSprint']) && !empty($_POST['editarSprint'])) {
    $n = 0;
    $proyecto = $_GET['proy'];
    $sprint = $_POST['editarSprint'];
    $sqledit = "UPDATE `sprint` SET";

    if (isset($_POST['nomSprint'.$sprint])&& !empty($_POST['nomSprint'.$sprint])) {
        $var = $_POST['nomSprint'.$sprint];
        if ($n == 0) {
            $sqledit = $sqledit . " `nombre_sp` = '$var'";
            $n = 1;
        } else {
            $sqledit = $sqledit . " , `nombre_sp` = '$var'";
        }
    }
    if (isset($_POST['inicioSprint'.$sprint])&& !empty($_POST['inicioSprint'.$sprint])) {
        $var = $_POST['inicioSprint'.$sprint];
        if ($n == 0) {
            $sqledit = $sqledit . " `inicio` = '$var'";
            $n = 1;
        } else {
            $sqledit = $sqledit . " , `inicio` = '$var'";
        }
    }
    if (isset($_POST['finSprint'.$sprint])&& !empty($_POST['finSprint'.$sprint])) {
        $var = $_POST['finSprint'.$sprint];
        if ($n == 0) {
            $sqledit = $sqledit . " `final` = '$var'";
            $n = 1;
        } else {
            $sqledit = $sqledit . " , `final` = '$var'";
        }
    }
    if (isset($_POST['desSprint'.$sprint])&& !empty($_POST['desSprint'.$sprint])) {
        $var = $_POST['desSprint'.$sprint];
        if ($n == 0) {
            $sqledit = $sqledit . " `objetivo` = '$var'";
            $n = 1;
        } else {
            $sqledit = $sqledit . " , `objetivo` = '$var'";
        }
    }
    $sqledit=$sqledit." WHERE `idsprint` = '$sprint' AND `spr_idproyect` = '$proyecto'";
    if ($con->query($sqledit) == true) {

    } else {
        echo '<p class="errorl">Error, problemas al actualizar Sprint</p>';
    }
    //echo $sqledit;
}