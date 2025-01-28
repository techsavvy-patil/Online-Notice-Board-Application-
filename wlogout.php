<?php session_start();
unset($_SESSION["ID"]);
unset($_SESSION["USERTYPE"]);
unset($_SESSION["MSG"]);
$_SESSION["MSG"]="LOGOUT SUCSSEFULY";
header("Location:login1.php");
?>