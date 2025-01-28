<?php include_once("dboperations.php");
$obj=new dboperations();
$obj->registerUser(
    $_POST["name"],
    $_POST["phone"],
    $_POST["email"],
    $_POST["username"],
    $_POST["password"]
);

header("Location:reg.php");
?>