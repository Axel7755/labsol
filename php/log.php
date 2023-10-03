<?php
session_start();
if(isset($_POST['cerrars'])){
                session_destroy();
}
require "./php/conexion.php";          
if(isset($_POST['correo'])){
$usuario = $_POST['correo'];
  if(isset($_POST['password'])){
    $Conl = $_POST['password'];
    $sql="SELECT idusuarios, CONCAT(nombre,' ',apP,' ',apM) AS nombre FROM `usuarios` WHERE correo = '$usuario' AND Contraseña = '$Conl'";
    //echo $sql;
    $res = $con->query($sql);                                   
    if($res->num_rows > 0){
      while($row=$res->fetch_assoc()){
        $ID = $row["idusuarios"];
        $usuario = $row["nombre"];        
        //unset($_SESSION ['Contras']) elimina esa bariable de sesion
        $_SESSION['ID']=$ID;
        $_SESSION['Usuario']=$usuario;
        $con->close();
        //echo $_SESSION['Usuario'];
        header("Location:./index.php");
                            
      }
    }else{
      echo'<p class="errorl">Usuario no existente</p>';
    }
  }
}

?>