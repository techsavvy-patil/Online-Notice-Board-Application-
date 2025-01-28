<?php include_once("dboperations.php");
$obj=new dboperations();
print_r($obj->loginAuth($_POST["username"],$_POST["password"]));
?>