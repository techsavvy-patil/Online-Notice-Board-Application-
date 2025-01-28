<?php include_once("dboperations.php");
$obj=new dboperations();
$obj->dept_opretions(
    $_POST["operation"],
    isset($_POST["dept_id"])? $_POST["dept_id"] : null,
    isset($_POST["dname"])? $_POST["dname"] : null
);
header("Location:dept_mast.php");
?>