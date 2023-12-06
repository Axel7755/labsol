<?php
require "../../php/conexion.php";

$proyecto = $_GET['proy'];
$sqlVerSrpints = "SELECT * FROM sprint WHERE spr_idproyect = '$proyecto'";
$res = $con->query($sqlVerSrpints);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()){
        echo'<div class="modal fade" id="EditarSprint'.$row["idsprint"].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Sprint: Nombre Sprint</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre del sprint</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Tablero Sprint 1">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Fecha de inicio</label>
                                    <input type="datetime-local" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Fecha de finalizacion</label>
                                    <input type="datetime-local" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="DesSprint1" class="form-label">Objetivo del Sprint</label>
                            <textarea name="DesSprint1" id="" cols="45" rows="10"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>';
    }
}