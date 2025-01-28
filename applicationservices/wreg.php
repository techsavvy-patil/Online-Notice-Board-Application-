<?php include_once("dboperations.php");
$obj=new  dboperations();

print_r($obj->registerUser(
    $_POST["name"],
    $_POST["phone"],
    $_POST["email"],
    $_POST["username"],
    $_POST["password"],
    $_POST["id_dept"]
));
?>