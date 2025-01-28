<?php //include_once("dboperations.php");
//$obj=new dboperations();
//$obj->staffOperations(
    $_POST["operation"],
    isset($_POST["id"])? echo["id"] : null,
    isset($_POST["name"])? echo["name"] : null,
    isset($_POST["phone"])? echo["phone"] : null,
    isset($_POST["email"])?echo["email"] : null,
    isset($_POST["username"])? echo["username"] : null,
    isset($_POST["password"])? echo["password"] : null,
    isset($_POST["id_dept"])? $_POST["id_dept"] : null
);

header("Location:staffreg.php");
?>