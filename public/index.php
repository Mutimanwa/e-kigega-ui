<?php
    session_start();
    
    //================== gerer les session 
if ($_SESSION['token'] == null || $_SESSION['token'] == "") {
  header("Location: ./../index.php");
  session_destroy();
}
?>