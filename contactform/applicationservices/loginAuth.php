<?php include_once("dboperations.php");
$obj=new DbOperations();
print_r($obj->loginAuth($_POST["username"],$_POST["password"]));
?>