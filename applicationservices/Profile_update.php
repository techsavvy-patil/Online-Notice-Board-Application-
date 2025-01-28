<?php include_once("dboperations.php");
$obj=new dboperations();
print_r($obj->profile_update(
    $_POST["name"],
    $_POST["email"],
    $_POST["phone"],
    $_POST["password"],
    $_POST["id"]
));
?>