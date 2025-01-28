<?php include_once("dboperations.php");
$obj=new dboperations();

print_r($obj->forgot_pass(
    $_POST["username"],
    $_POST["password"]
));
?>