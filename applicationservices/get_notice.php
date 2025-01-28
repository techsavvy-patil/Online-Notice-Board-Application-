<?php include_once("dboperations.php");
$obj=new dboperations();
print_r($obj->get_Notice(
    $_POST["id_dept"],
    $_POST["usertype"],
    $_POST["type_id"]
));
?>