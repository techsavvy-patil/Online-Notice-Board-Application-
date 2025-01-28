<?php include_once("dboperations.php");
$obj=new dboperations();
$obj->studoperations(
    $_POST["operation"],
    isset($_POST["id"])? $_POST["id"] : null,
    isset($_POST["name"])? $_POST["name"] : null,
    isset($_POST["phone"])? $_POST["phone"] : null,
    isset($_POST["email"])? $_POST["email"] : null,
    isset($_POST["username"])? $_POST["username"] : null,
    isset($_POST["password"])? $_POST["password"] : null,
    isset($_POST["id_dept"])? $_POST["id_dept"] : null
);
header("Location:index.php");
?>