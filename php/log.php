<?php
session_start();
if (isset($_POST['cerrars'])) {
  session_destroy();
}
require "../php/conexion.php";
if (isset($_POST['mandar'])) {
  if (isset($_POST['correo'])) {
    $usuario = $_POST['correo'];
    if (isset($_POST['password'])) {
      $cont = $_POST['password'];
      $conthash = password_hash($cont, PASSWORD_DEFAULT);
      $sql = "SELECT idalumno, CONCAT(al_nombre,' ',al_apP,' ',al_apM) AS nombre, al_conthash FROM `alumno` WHERE al_correo = '$usuario'";
      //echo $sql;
      $res = $con->query($sql);
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
          $ID = $row["idalumno"];
          $usuario = $row["nombre"];
          $conth = $row["al_conthash"];
          //unset($_SESSION ['Contras']) elimina esa bariable de sesion
          if (password_verify($cont, $conth)) {
            $_SESSION['ID'] = $ID;
            $_SESSION['Usuario'] = $usuario;
            $_SESSION['Tipo'] = 1;
            $con->close();
            //echo $_SESSION['Usuario'];
            header("Location:../index.php");
          } else {
            echo "<br><p style='color: red;'>Contraseña incorrecta</p>";
          }
        }
      } else {
        $sql = "SELECT idsolicitante, CONCAT(so_nombre,' ',so_apP,' ',so_apM) AS nombre, so_conthash FROM `solicitante` WHERE so_correo = '$usuario'";
        //echo $sql;
        $res = $con->query($sql);
        if ($res->num_rows > 0) {
          while ($row = $res->fetch_assoc()) {
            $ID = $row["idsolicitante"];
            $usuario = $row["nombre"];
            $conth = $row["so_conthash"];
            //unset($_SESSION ['Contras']) elimina esa bariable de sesion
            if (password_verify($cont, $conth)) {
              $_SESSION['ID'] = $ID;
              $_SESSION['Usuario'] = $usuario;
              $_SESSION['Tipo'] = 0;
              $con->close();
              //echo $_SESSION['Usuario'];
              header("Location:../index.php");
            }
          }
        } else {
          $sql = "SELECT idadministrador, CONCAT(ad_nombre,' ',ad_apP,' ',ad_apM) AS nombre, ad_conthash FROM `administrador` WHERE ad_correo = '$usuario'";
          //echo $sql;
          $res = $con->query($sql);
          if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
              $ID = $row["idadministrador"];
              $usuario = $row["nombre"];
              $conth = $row["ad_conthash"];
              //unset($_SESSION ['Contras']) elimina esa bariable de sesion
              if (password_verify($cont, $conth)) {
                $_SESSION['ID'] = $ID;
                $_SESSION['Usuario'] = $usuario;
                $_SESSION['Tipo'] = 2;
                $con->close();
                //echo $_SESSION['Usuario'];
                header("Location:../index.php");
              }
            }
          } else {
            echo '<p class="errorl">Usuario no existente</p>';
          }
        }
      }
    } else {

      echo '<p class="errorl">Llene los campos</p>';
    }
  } else {

    echo '<p class="errorl">Llene los campos</p>';
  }
}
