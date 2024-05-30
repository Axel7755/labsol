<?php
require "../../php/conexion.php";

$proyecto = $_GET['proy'];
$sqlVerIncSprint = "SELECT * FROM tarea WHERE ta_spr_idproyect = '$proyecto'";
$res = $con->query($sqlVerIncSprint);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()){
        echo'
        <div class="modal fade" id="incidenciaEditar'.$row["idtarea"].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body">
                    
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre de incidencia</label>
                            <input type="text" class="form-control" name="nomIncidencia" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="'.$row["tarea"].'">
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Estado</label>
                            <select class="form-select" name="estAlIncidencia" aria-label="Default select example" id="t-incidencia">';
                            $sqlVerEstAl= "SELECT idestadoAl, estadoAl FROM estadoAl WHERE estAl_idproyect = '$proyecto'";
                            $resVerEstAl = $con->query($sqlVerEstAl);
                            if ($resVerEstAl->num_rows > 0) {
                                while ($rowVerEstAl = $resVerEstAl->fetch_assoc()){

                                    if($rowVerEstAl["idestadoAl"]==$row["estadoAl_idestadoAl"]){
                                        echo'<option selected value="'.$rowVerEstAl["idestadoAl"].'">'.$rowVerEstAl["estadoAl"].'</option>';
                                    }else{

                                        echo'<option value="'.$rowVerEstAl["idestadoAl"].'">'.$rowVerEstAl["estadoAl"].'</option>';
                                    }
                                }
                            }
                            echo'
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                            <textarea name="desIncidencia" id="" cols="45" rows="10">'.$row["descripcion"].'</textarea>
                        </div>
                        <div class="subincidencias-group'.$row["idsprint"].'">';

                        $sqlverSubInc="SELECT * FROM `tarea` WHERE `tarea_idtarea` = '".$row["idtarea"]."'";
                        $x=1;
                        $resverSubInc = $con->query($sqlverSubInc);
                        if ($resverSubInc->num_rows > 0) {
                            while ($rowverSubInc = $resverSubInc->fetch_assoc()){
                            echo'<div class="flex">
                                <input type="text" class="form-control" placeholder="'.$rowverSubInc["tarea"].'" name="nombreSub'.$x.'">
                                <label>Descripcion</label>
                                <textarea cols="45" rows="10" class="form-control" name="descrip'.$x.'"></textarea>
                                <a class="delete">×</a>
                                <input type="hidden" name="ning" value="'.$x.'">
                            </div>';
                            $x++;
                            }
                        }
                        '</div>
                        <div class="mb-3">
                            <button type="button" class="btn add-sprint-button">
                                <p onclick="addInput('.$row["idsprint"].')" class="element"><i class="bi bi-plus"></i>Agregar subincidencia</p>
                            </button>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Informador</label>
                            <select class="form-select" name="informadorIncidencia" aria-label="Default select example" id="t-incidencia">';
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
                            <select class="form-select" name="responsableIncidencia" aria-label="Default select example" id="t-incidencia">';
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
                            <select class="form-select" name="prioriIncidencia" aria-label="Default select example" id="t-incidencia">
                                <option>Urgente</option>
                                <option>Alta</option>
                                <option selected>Media</option>
                                <option>Baja</option>
                                <option>Muy baja</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="t-incidencia" class="form-label">Sprint</label>
                            <select class="form-select" name="sprintIcidencidencia" aria-label="Default select example" id="t-incidencia">';
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
                        <button type="sumbmit" name="editarIncidencia" class="btn btn-primary">Crear</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        ';
    }
}
