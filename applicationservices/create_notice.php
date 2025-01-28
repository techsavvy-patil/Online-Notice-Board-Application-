<?php include_once("dboperations.php");
$obj=new dboperations();
print_r($obj->noticeoperation(
    $_POST["title"],
    $_POST["type_id"],
    $_POST["usertype"],
    $_POST["date"],
    $_POST["description"],
    $_POST["id_dept"],
    $_POST["staff_id"]
));
?>