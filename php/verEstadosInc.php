<?php
require "../../php/conexion.php";

$proyecto = $_GET['proy'];
$sqEstadosAlumn="SELECT * FROM `estadoAl` WHERE `estAl_idproyect` = '$proyecto' ORDER BY `idestadoAl` ASC";                               
                
$res =$con->query($sqEstadosAlumn);
     
if($res->num_rows>0){
    $i=1;
    while($row = $res->fetch_assoc()){
        if($i<=3){
            echo'
            <div class="box cajas">
                <input type="text" id="'.$row["idestadoAl"].'" class="nuevoTitulo" value="'.$row["estadoAl"].'" readonly>';
        }else{
            echo'
            <div class="box cajas">
                <input type="text" id="'.$row["idestadoAl"].'" class="nuevoTitulo" placeholder="'.$row["estadoAl"].'">';
        } 

            $sqlVerInci = "SELECT * FROM `tarea` ta JOIN `sprint` sp ON(ta.sprint_idsprint=sp.`idsprint`) 
            WHERE ta.estadoAl_idestadoAl = '".$row["idestadoAl"]."' AND sp.estado = 'activo' AND 
            `sp`.`spr_idproyect` = '$proyecto' AND ta.tarea_idtarea IS NULL ORDER BY `tarea_idtarea` ASC";

            $resVerInci =$con->query($sqlVerInci);
            if($resVerInci->num_rows>0){
                $i=1;
                while($rowVerInci = $resVerInci->fetch_assoc()){
                    echo'
                    <div class="list" id="'.$rowVerInci["idtarea"].'" draggable="true">
                        '.$rowVerInci["tarea"].'
                    </div>';
                }
            }

            echo '</div>';
            $i++;       
    }
    
}
else{
    echo "<br><p style='color: red;'>Error no se encontraron datos</p>";
}
