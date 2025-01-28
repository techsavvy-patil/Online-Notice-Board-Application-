<?php include_once("dboperations.php");
$obj=new  DbOperations();
print_r($obj->registeruser(
    $_POST["name"],
    $_POST["phone"],
    $_POST["email"],
    $_POST["username"],
    $_POST["password"]
));
?>