<?php
if(isset($_SESSION['Usuario'])){
  
}else{
  //echo'solo else';
  header("Location: /labsol/pages/login.php");
}
?>