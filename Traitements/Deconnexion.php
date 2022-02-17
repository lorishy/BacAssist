<?php 
session_start();
session_destroy();
setcookie("BtsAssist",'', time() -3600, "/");
header("location:../Pages/Index.php");
?>