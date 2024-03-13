<?php
require "../../php/conexion.php";

$proyecto = $_GET['proy'];
$sqlVerSrpints = "SELECT * FROM sprint WHERE spr_idproyect = '$proyecto'";
$res = $con->query($sqlVerSrpints);
$id = $_SESSION['ID'];
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()){
        //echo $row["estado"]."estado";
        echo '<div class="modal fade" id="incidenciaCrear'.$row["idsprint"].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                    
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre de incidencia</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Nombre de incidencia">
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Estado</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option selected value="1">Por hacer</option>
                                <option value="2">En progreso</option>
                                <option value="3">Listo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                            <textarea name="DesSprint1" id="" cols="45" rows="10"></textarea>
                        </div>
                        <div class="subincidencias-group'.$row["idsprint"].'">

                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn add-sprint-button">
                                <p onclick="addInput('.$row["idsprint"].')" class="element"><i class="bi bi-plus"></i>Agregar subincidencia</p>
                            </button>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Informador</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">';
                                $sqlVerUsuarios= "SELECT idalumno, CONCAT(al_nombre,' ',al_apP,' ',al_apM) as nombre
                                FROM alumno al JOIN proyecto_alumno proy ON(proy.pa_idalumno = al.idalumno) WHERE proy.pa_idproyect = '$proyecto'";
                                $resVerUs = $con->query($sqlVerUsuarios);
                                if ($resVerUs->num_rows > 0) {
                                while ($rowVerUs = $resVerUs->fetch_assoc()){

                                    if($rowVerUs["idalumno"]==$_SESSION['ID']){
                                        echo'
                                        <option selected value="'.$rowVerUs["idalumno"].'">'.$rowVerUs["nombre"].'</option>';
                                    }else{
                                        echo'
                                        <option value="'.$rowVerUs["idalumno"].'">'.$rowVerUs["nombre"].'</option>';
                                    }
                                        
                                    }
                                }
                                echo'
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Responsable</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">';
                            $sqlVerUsuarios= "SELECT idalumno, CONCAT(al_nombre,' ',al_apP,' ',al_apM) as nombre
                            FROM alumno al JOIN proyecto_alumno proy ON(proy.pa_idalumno = al.idalumno) WHERE proy.pa_idproyect = '$proyecto'";
                            $resVerUs = $con->query($sqlVerUsuarios);
                            if ($resVerUs->num_rows > 0) {
                            while ($rowVerUs = $resVerUs->fetch_assoc()){

                                if($rowVerUs["idalumno"]==$_SESSION['ID']){
                                    echo'
                                    <option selected value="'.$rowVerUs["idalumno"].'">'.$rowVerUs["nombre"].'</option>';
                                }else{
                                    echo'
                                    <option value="'.$rowVerUs["idalumno"].'">'.$rowVerUs["nombre"].'</option>';
                                }
                                    
                                }
                            }
                            echo'
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Prioridad</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">
                                <option value="1">Muy alta</option>
                                <option value="2">Alta</option>
                                <option selected value="3">Media</option>
                                <option value="1">baja</option>
                                <option value="2">Muy baja</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Sprint</label>
                            <select class="form-select" aria-label="Default select example" id="t-incidencia">';
                            $sqlVerSrpintsSubIn = "SELECT * FROM sprint WHERE spr_idproyect = '$proyecto'";
                            $resSubIn = $con->query($sqlVerSrpintsSubIn);
                            if ($resSubIn->num_rows > 0) {
                                while ($rowsub = $resSubIn->fetch_assoc()){
                                    if($rowsub["idsprint"]==$row["idsprint"]){
                                        echo'
                                        <option selected value="'.$rowsub["idsprint"].'">'.$rowsub["nombre_sp"].'</option>';
                                    }else{
                                        echo'
                                        <option value="'.$rowsub["idsprint"].'">'.$rowsub["nombre_sp"].'</option>';
                                    }
                                }
                            }

                            echo'</select>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="sumbmit" class="btn btn-primary">Crear</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
    }
}