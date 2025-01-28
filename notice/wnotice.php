<?php include_once("dboperations.php");
$obj=new dboperations();
$obj->noticeoperation(
    $_POST["operation"],
    isset($_POST["id"])? $_POST["id"] : null,
    isset($_POST["title"])? $_POST["title"] : null,
    isset($_POST["type_id"])? $_POST["type_id"] : null,
    isset($_POST["usertype"])? $_POST["usertype"] :null,
    isset($_POST["date"])? $_POST["date"] :null,
    isset($_POST["description"])? $_POST["description"] : null,
    isset($_POST["id_dept"])? $_POST["id_dept"] : null,
    isset($_POST["staff_id"])? $_POST["staff_id"] : null
);
if($_SESSION["USERTYPE"]=="staff"){
    header("Location: notice.php");
}else 
if($_SESSION["USERTYPE"]=="admin"){
    header("Location: notice.php");    
}
?>
